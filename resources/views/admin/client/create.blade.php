<form action="{{route('client.store')}}" method="post" enctype="multipart/form-data" id="submit_form">
    @csrf

   <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for=""> Name</label>
                <input class="form-control" required type="text" name="name" placeholder="EX:Mohammad">
            </div>
         </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <label for=""> Photo</label>
                <input type="file" required name="image" class="form-control">
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <label for=""> Company Logo</label>
                <input type="file" required name="company_logo" class="form-control">
            </div>
        </div>


        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label > Client Review</label>
               <textarea required name="review" class="form-control"  rows="5"></textarea>
        </div>


    </div>

    <button type="submit"  class="btn btn-primary ml-3">Submit</button>

</form>

