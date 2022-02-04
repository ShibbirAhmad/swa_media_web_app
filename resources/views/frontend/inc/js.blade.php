<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/js/all.min.js') }}"></script>
<script src="{{ asset('frontend/js/index.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.js"></script>










<script>
    $(document).ready(function() {


        paypal.Buttons({

            // Sets up the transaction when a payment button is clicked
            createOrder: function(data, actions) {
                var amount = parseInt($('#total_cart_payment_amount').text());
                if (amount <= 0) {
                    Swal.fire({
                        type: 'error',
                        title: '<P style="color: red;">Oops...<p>',
                        text: resp.errors,
                        footer: '<b> your cart is empty and payable amount is empty.</b>'
                    });
                    return;
                }
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: amount // Can reference variables or functions. Example: `value: document.getElementById('...').value`
                        }
                    }]
                });
            },

            // Finalize the transaction after payer approval
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For dev/demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null,
                        2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    // alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');
                    const resp_data = {
                        transaction_id: transaction.id,
                        payment_status: transaction.status,
                        paid: transaction.amount.value,
                    }
                    let csrf_token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': csrf_token
                        },
                        url: '/api/create/service/order',
                        method: 'post',
                        data: resp_data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(resp) {
                            console.log(resp)
                            if (resp.success == "OK") {
                                toastMessage(resp.message);
                                setTimeout(() => {
                                    location.reload();
                                }, 3000);
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






        //quick cart check 
        $('.quick_cart_btn').on('click', function() {
            let $service_id = $(this).attr('service_id');
            let $action = '{{ url('api/add/cart') }}';
            let csrf_token = $('meta[name="csrf-token"]').attr('content');
            $data = {
                'quantity': 1
            };
            //ajax action is here
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': csrf_token
                },
                url: $action + '/' + $service_id,
                method: 'POST',
                data: $data,
                success: function(resp) {
                    console.log(resp)
                    if (resp.status == "OK") {
                        toastMessage(resp.message);
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
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
                    alert("something went wrong");
                }
            });

        });



        function toastMessage(message) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-center',
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

            setTimeout(() => {}, 3000);
        }

    });
</script>
