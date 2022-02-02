<form action="{{ route('general_setting.update', $general_setting->id) }}" method="POST" enctype="multipart/form-data" id="submit_form">
    @method('PUT')
    @csrf

   <div class="row">

    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label >Site Title</label>
            <input class="form-control" required type="text" name="title" value="{{ $general_setting->title }}"  >
        </div>
    </div>


       <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label >Contact Email</label>
                <input class="form-control" required type="text" name="contact_email" value="{{ $general_setting->contact_email }}"  >
            </div>
        </div>


       <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label >Contact Phone</label>
                <input class="form-control" required type="text" name="contact_number" value="{{ $general_setting->contact_number }}"  >
            </div>
        </div>

       <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label >Contact Address</label>
                <input class="form-control" required type="text" name="contact_address" value="{{ $general_setting->contact_address }}"  >
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <label for=""> Logo</label>
                <input type="file"  name="logo" class="form-control">
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <label > Favicon</label>
                <input type="file"  name="fav_icon" class="form-control">
            </div>
        </div>


        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for=""> Linkedin Link</label>
                <input class="form-control" value="{{ $general_setting->linkedin_url }}" type="text" name="linkedin_url" placeholder="EX:Social">
            </div>
         </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label > Facebook  Link</label>
                <input class="form-control" value="{{ $general_setting->facebook_url }}"  type="text" name="facebook_url" placeholder="EX:Social">
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label> Youtube  Link</label>
                <input class="form-control" value="{{ $general_setting->youtube_url }}"  type="text" name="youtube_url" placeholder="EX:Social">
            </div>
        </div>


          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label > Twitter  Link</label>
                <input class="form-control" value="{{ $general_setting->twitter_url }}" type="text" name="twitter_url" placeholder="EX:Social">
            </div>
         </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label > Instagram  Link</label>
                <input class="form-control" value="{{ $general_setting->instagram_url }}"  type="text" name="instagram_url" placeholder="EX:Social">
            </div>
        </div>

           <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label > Documentory Video  Link</label>
                <input class="form-control" value="{{ $general_setting->video_url }}"  type="text" name="video_url" placeholder="EX:Docuemotory video">
            </div>
        </div>


    </div>

    <button type="submit" class="btn btn-primary">Save</button>

</form>


