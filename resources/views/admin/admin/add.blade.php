<form action="{{ route('admin.store') }}" method="POST" id="" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for=""> Name</label>
        <input class="form-control" type="text" name="name" placeholder="Ex:Jone">
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input class="form-control" type="email" name="email" placeholder="Ex:jone@gmail.com">
    </div>

    <div class="form-group">
        <label for="">Password</label>
        <input class="form-control" type="password" name="password" placeholder="Ex:********">
    </div>

    <div class="form-group">
        <label for="">Image</label>
        <input class="form-control" type="file" name="image">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>


