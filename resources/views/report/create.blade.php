@extends('layouts.app')
@section('content')

<div class="container">

	@if ($errors->any())
	<div class="alert alert-dismissable alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong>Error when adding report</strong>
		</div>
	@endif

	<div class="row">
		<div class="col-md-10">
			<h3>Complaint</h3>
		</div>
	</div>

	<form class="forms-sample" method="post" action="{{ route('reports.store') }}">
		@csrf
		<div class="form-group">
			<label for="report">Report :</label>
			<textarea type="text" name="report" class="form-control" id="report" placeholder="Enter your comment" rows="4"></textarea> 
		</div>
		<button type="submit" class="btn btn-success mr-2" name="submit">Submit</button>
	</form>

</div>
@endsection