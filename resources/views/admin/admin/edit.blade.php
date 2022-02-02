<form action="{{ route('admin.update', $admin->id) }}" method="POST" id="modal_show_edit" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="">admin Name</label>
        <input class="form-control" type="text" value="{{ $admin->name }}" name="name" placeholder="Ex:Jone">
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input class="form-control" type="email" value="{{ $admin->email }}" name="email" placeholder="Ex:jone@gmail.com">
    </div>

    <div class="form-group">
        <label for="">Image</label>
        <input class="form-control" type="file" value="{{ $admin->image }}" name="image">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>


