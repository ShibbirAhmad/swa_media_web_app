<form action="{{ route('team.update', $team->id) }}" method="POST"  enctype="multipart/form-data" id="submit_form">
    @method('PUT')
    @csrf


   <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for=""> Name</label>
                <input class="form-control" value="{{ $team->name }}" type="text" name="name" placeholder="EX:Mohammad">
            </div>
         </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for=""> Designation</label>
                <input class="form-control" value="{{ $team->designation }}" type="text" name="designation" placeholder="EX:Programmer">
            </div>
        </div>


        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for=""> Display Position</label>
                <select name="position"  class="form-control">
                    <option disabled selected>select one</option>
                    <option value="1"
                    @if ($team->position==1)
                      selected
                    @endif >1</option>
                    <option value="2"
                     @if ($team->position==2)
                      selected
                    @endif >2</option>
                    <option value="3"
                     @if ($team->position==3)
                      selected
                    @endif >3</option>
                    <option value="4"
                     @if ($team->position==4)
                      selected
                    @endif >4</option>
                    <option value="5"
                     @if ($team->position==5)
                      selected
                    @endif>5</option>
                    <option value="6"
                     @if ($team->position==6)
                      selected
                    @endif>6</option>
                    <option value="7"
                    @if ($team->position==7)
                      selected
                    @endif>7</option>
                    <option value="8"
                    @if ($team->position==8)
                      selected
                    @endif>8</option>
                    <option value="9"
                    @if ($team->position==9)
                      selected
                    @endif>9</option>
                    <option value="10" @if ($team->position==10)
                      selected
                    @endif>10</option>

                </select>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <label for=""> Photo</label>
                <input type="file"  name="image" class="form-control">
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for=""> Linkedin Profile Link</label>
                <input class="form-control" value="{{ $team->linkedin_url }}" type="text" name="linkedin_url" placeholder="EX:Social">
            </div>
         </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for=""> Facebook Profile Link</label>
                <input class="form-control" value="{{ $team->facebook_url }}"  type="text" name="facebook_url" placeholder="EX:Social">
            </div>
        </div>

          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for=""> Twitter Profile Link</label>
                <input class="form-control" value="{{ $team->twitter_url }}" type="text" name="twitter_url" placeholder="EX:Social">
            </div>
         </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for=""> Instagram Profile Link</label>
                <input class="form-control" value="{{ $team->instagram_url }}"  type="text" name="instagram_url" placeholder="EX:Social">
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for=""> Google Plus Profile Link</label>
                <input class="form-control" value="{{ $team->google_plus_url }}"  type="text" name="google_plus_url" placeholder="EX:Social">
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for=""> Phone</label>
                <input class="form-control" value="{{ $team->phone }}"  type="number" name="phone" placeholder="EX:01471252">
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for=""> Email</label>
                <input class="form-control" value="{{ $team->email }}"  type="email" name="phone" placeholder="EX:example@gmail.com">
            </div>
        </div>


    </div>

    <button type="submit" class="btn btn-primary">Save</button>

</form>


