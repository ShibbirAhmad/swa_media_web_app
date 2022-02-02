<form action="{{ route('company_logo.update', $logo->id) }}" method="POST"  enctype="multipart/form-data" id="submit_form">
    @method('PUT')
    @csrf
   <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for=""> Photo</label>
          <input type="file"  name="image" class="form-control">
      </div>
  </div>
</div>

</div>

    <button type="submit" class="btn btn-primary">Save</button>

</form>




