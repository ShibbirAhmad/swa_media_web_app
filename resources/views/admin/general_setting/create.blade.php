<form action="{{route('general_setting.store')}}" method="post" enctype="multipart/form-data" id="submit_form">
    @csrf

   <div class="row">

        <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <label for=""> Logo</label>
                <input type="file" required name="image" class="form-control">
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for=""> Linkedin Profile Link</label>
                <input class="form-control" required type="text" name="linkedin_url" placeholder="EX:Social">
            </div>
         </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for=""> Facebook Profile Link</label>
                <input class="form-control"  type="text" name="facebook_url" placeholder="EX:Social">
            </div>
        </div>

          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for=""> Twitter Profile Link</label>
                <input class="form-control"  type="text" name="twitter_url" placeholder="EX:Social">
            </div>
         </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for=""> Instagram Profile Link</label>
                <input class="form-control"  type="text" name="instagram_url" placeholder="EX:Social">
            </div>
        </div>


    </div>

    <button type="submit"  class="btn btn-primary">Submit</button>

</form>

