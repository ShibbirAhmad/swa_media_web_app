<form action="{{route('service.store')}}" method="post" enctype="multipart/form-data" id="submit_form">
    @csrf

   <div class="row">

        <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <label for=""> Title</label>
                <input type="text" required name="title" class="form-control" placeholder="ex. title">
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="exampleSelect">Service Type</label>
                <select class="form-control" id="exampleSelect" name="service_type">
                  <option value="logo_design">Logo Design</option>
                  <option value="business_card_design">Business card design</option>
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
              <label for=""> Price</label>
              <input type="number" required name="price" class="form-control" placeholder="ex. 20000">
          </div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
              <label for=""> Description</label>
              <textarea name="description" id="description" class="form-control" cols="15" rows="5"></textarea>
          </div>
      </div>

    </div>

    <button type="submit"  class="btn btn-primary">Submit</button>

</form>

