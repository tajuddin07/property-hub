@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3>Edit Profile</h3>
        </div>
    </div>

    <form class="forms-sample" method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="inputNameAdmin">Name</label>
            <input type="text" name="updateName" class="form-control" id="inputName" placeholder="Enter Name" value="{{ $user->name }}"/>
        </div>
        {{-- <div class="form-group">
            <label for="inputPasswd">Password</label>
            <input type="password" name="inputPasswd" class="form-control" id="inputPasswd"
                placeholder="Enter Password">
        </div> --}}
        <div class="form-group">
            <label for="inputPhoneNumber">Phone Number</label>
            <input type="text" name="updatePhoneNumber" class="form-control" id="inputPhoneNumber"
                placeholder="Enter Phone Number" value="{{ $user->phone_no }}">
        </div>
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" name="updateEmail" class="form-control" id="inputEmail" placeholder="Enter Email" value="{{ $user->email }}">
        </div>
        <label for="inputEmail">Upload Picture</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="fileName">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        <input type="hidden" name="inputRole" value="admin" id="inputEmail">

        <br><br>
        <button type="submit" class="btn btn-success mr-2">Submit</button>
        <button class="btn btn-danger">Cancel</button>
    </form>

</div>
@endsection

@section('scriptsEdit')
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script> 
@stop 