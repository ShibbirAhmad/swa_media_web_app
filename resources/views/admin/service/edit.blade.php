<form action="{{ route('service.update', $service->id) }}" method="POST"  enctype="multipart/form-data" id="submit_form">
    @method('PUT')
    @csrf
   <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="">Title</label>
            <input type="text" name="title" class="form-control" value="{{$service->title}}" placeholder="ex. jackets">
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="">Service Type</label>
            <input type="text" name="service_type" class="form-control" value="{{$service->service_type}}" placeholder="ex. jackets">
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for=""> Photo</label>
            <input type="file" name="image" class="form-control">
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="">Price</label>
            <input type="number" name="price" class="form-control" value="{{$service->price}}" placeholder="ex. 123456">
        </div>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="form-group">
            <label for=""> Description</label>
            <textarea name="description" id="description" class="form-control" cols="15" rows="5">{{$service->description}}</textarea>
        </div>
    </div>
</div>

</div>

    <button type="submit" class="btn btn-primary">Save</button>

</form>




