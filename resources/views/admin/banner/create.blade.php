<form action="{{route('banner.store')}}" method="post" enctype="multipart/form-data" id="submit_form">
    @csrf

   <div class="row">

        <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <label for=""> Photo</label>
                <input type="file" required name="image" class="form-control">
            </div>
        </div>
    </div>

    <button type="submit"  class="btn btn-primary">Submit</button>

</form>

