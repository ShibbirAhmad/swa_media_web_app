<form action="{{route('team.store')}}" method="post" enctype="multipart/form-data" id="submit_form">
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
                <label for=""> Designation</label>
                <input class="form-control" required type="text" name="designation" placeholder="EX:Programmer">
            </div>
        </div>


        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for=""> Display Position</label>
                <select name="position" required class="form-control">
                    <option disabled selected>select one</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
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
                <label for=""> Instagram Profile Link</label>
                <input class="form-control"  type="text" name="instagram_url" placeholder="EX:Social">
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
                <label for=""> Google Plus Link</label>
                <input class="form-control"  type="text" name="google_plus_url" placeholder="EX:Google Plus">
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for=""> Phone</label>
                <input class="form-control"  type="text" name="phone" placeholder="EX:Phone">
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for=""> Email</label>
                <input class="form-control"  type="email" name="email" placeholder="EX:example@gmail.com">
            </div>
        </div>


    </div>

    <button type="submit"  class="btn btn-primary">Submit</button>

</form>

