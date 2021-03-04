@extends('layouts.app')
@section('content')

<div class="container">

	@if(session()->has('success'))
		<div class="alert alert-dismissable alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong>
				{!! session()->get('success') !!}
			</strong>
		</div>
	@elseif(isset($errors) && count($errors) > 0)
		<div class="alert alert-dismissable alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong>Error adding admin</strong>
		</div>
	@endif

	<div class="row">
		<div class="col-md-10">
			<h3>Add Admin</h3>
		</div>
	</div>

	<form class="forms-sample" method="post" action="{{ route('users.store') }}">
		@csrf
		<div class="form-group">
			<label for="inputNameAdmin">Name</label>
			<input type="text" name="inputNameAdmin" class="form-control" id="inputNameAdmin" placeholder="Enter Name">
		</div>
		<div class="form-group">
			<label for="inputPasswd">Password</label>
			<input type="password" name="inputPasswd" class="form-control" id="inputPasswd" placeholder="Enter Password">
		</div>
		<div class="form-group">
			<label for="inputPhoneNumber">Phone Number</label>
			<input type="text" name="inputPhoneNumber" class="form-control" id="inputPhoneNumber" placeholder="Enter Phone Number">
		</div>
		<div class="form-group">
			<label for="inputEmail">Email</label>
			<input type="email" name="inputEmail" class="form-control" id="inputEmail" placeholder="Enter Email">
		</div>
		<input type="hidden" name="inputRole" value="admin" id="inputEmail">
		<button type="submit" class="btn btn-success mr-2">Submit</button>
		<button class="btn btn-danger">Cancel</button>
	</form>	

</div>
@endsection