@extends('layouts.app')
@section('content')

<!-- List of All Properties -->
<div class="container-fluid">

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
			<li><strong>{!! $errors !!}</strong></li>
		</div>
	@endif

	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center">List of Properties</h3>
		</div>
	</div>

	<table class="table table-striped">
		<thead>
			<tr>
				<td>No.</td>
				<td>Owned By</td>
				<td>Description</td>
				<td>Address</td>
				<td>Price</td>
				<td>Status</td>
				<td>Picture</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
			{{-- @if($total_row > 0) --}}
				@foreach($properties as $element => $property)
				<tr>
					<td>{{$element + 1}}</td>
					<td>{{ $property->name }}</td>
					<td>{{ $property->description }}</td>
					<td>{{ $property->address }}</td>
					<td>RM{{ $property->price }}</td>
					<td>{{ $property->status }}</td>
					<td><img src="/uploads/properties/{{$property->picture}}" style="width:50%"></td>
					<td>
						<form action="{{route('properties.destroy',$property->id)}}" method="post">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger">Delete</button>
						</form>
					</td>
				</tr>
				@endforeach
			{{-- @else
				<tr>
					<td align="center" colspan="8">No Data Found</td>
				</tr>
			@endif --}}
		</tbody>
	</table>
</div>
@endsection