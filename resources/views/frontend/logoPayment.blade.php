@extends('frontend.layouts.app')
@section('content')
<section id="payment">
    <div class="container">
     <div class="search text-end">
         <form action="">
           <input type="text" class="search-box" />
           <span class="search-icon"> <i class="fas fa-search"></i></span>
         </form>
       </div>
       <div class="row justify-content-evenly">
           <div class="col-md-5 offset-lg-1 offset-sm-2 text-center">
               <h3 class="title text-center">{{$detailsService->title}}</h3>
               <div class="img ">
                   <img src="{{asset('storage/'.$detailsService->image)}}" alt="{{$detailsService->title}}">
                   <a href=""><i class="fas fa-shopping-cart"></i></a>
               </div>
              
                
               <br>
               <br>

               <div class="p_btn_container">

                   <div id="paypal-button-container"></div>
              
               </div>
               
        
           </div>
           <div class="col-md-5 description text-center">
               <h2>Discription</h2>
               <p style="font-size: 14px">{{$detailsService->description}}</p>
                <h5 class="price">$ {{$detailsService->price}}</h5>
           </div>
       </div>
    </div>
 </section>

@endsection


@push('extra_js')

<script>
    paypal.Buttons({

      // Sets up the transaction when a payment button is clicked
      createOrder: function(data, actions) {
        return actions.order.create({
    
          purchase_units: [{
            amount: {
              value: '77.44' // Can reference variables or functions. Example: `value: document.getElementById('...').value`
            }
          }]
        });
      },

      // Finalize the transaction after payer approval
      onApprove: function(data, actions) {
        return actions.order.capture().then(function(orderData) {
          // Successful capture! For dev/demo purposes:
              console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
              var transaction = orderData.purchase_units[0].payments.captures[0];
             // alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');
              const data = {
                transaction_id: transaction.id,
                payment_status: transaction.status,
                paid: transaction.amount.value,
              }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                url: '/api/create/service/order',
                method: 'post',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(resp) {
                    console.log(resp)
                    if (resp.success == "OK") {
                        toastMessage(resp.message);
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: '<P style="color: red;">Oops...<p>',
                            text: resp.errors,
                            footer: '<b> Something Wrong</b>'
                        });
                    }


                },
                //error function
                error: function(e) {
                    console.log(e);
                    alert("Something went wrong");
                }
            });
          // When ready to go live, remove the alert and show a success message within this page. For example:
          // var element = document.getElementById('paypal-button-container');
          // element.innerHTML = '';
          // element.innerHTML = '<h3>Thank you for your payment!</h3>';
          // Or go to another URL:  actions.redirect('thank_you.html');
        });
      }
    }).render('#paypal-button-container');





    function toastMessage(message) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal
                        .stopTimer)
                    toast.addEventListener('mouseleave', Swal
                        .resumeTimer)
                }
            })

            Toast.fire({
                type: 'success',
                title: message
            })

            setTimeout(() => {
                location.reload();
            }, 1000);
        }




  </script>
@endpush