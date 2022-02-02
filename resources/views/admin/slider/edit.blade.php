<form action="{{ route('slider.update', $slider->id) }}" method="POST"  enctype="multipart/form-data" id="submit_form">
    @method('PUT')
    @csrf


   <div class="row">

           
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label for=""> Slider Banner</label>
                  <input type="file" required name="image" class="form-control">
              </div>
          </div>
        
       


    </div>

    <button type="submit" class="btn btn-primary">Save</button>

</form>


