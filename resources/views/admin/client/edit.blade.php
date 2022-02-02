<form action="{{ route('client.update', $client->id) }}" method="POST"  enctype="multipart/form-data" id="submit_form">
    @method('PUT')
    @csrf


   <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label > Name</label>
                <input class="form-control" value="{{ $client->name }}" type="text" name="name" placeholder="EX:Mohammad">
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
                <label for=""> Company Logo</label>
                <input type="file"  name="company_logo" class="form-control">
            </div>
        </div>


        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label > Client Review</label>
               <textarea  name="review" class="form-control"  rows="5">
                   {{ $client->review }}
               </textarea>
        </div>


    </div>

    <button type="submit" class="btn btn-primary ml-3">Save</button>

</form>


