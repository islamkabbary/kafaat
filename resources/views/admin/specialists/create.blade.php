<form action="{{url('/admin/specialist/store')}}"  method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">

        <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

    </div>
    <div class="form-group">

        <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">

        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

</form>
