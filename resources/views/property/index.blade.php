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
			<li><strong>{!! $errors !!}</strong></li>
		</div>
	@endif

	<div class="row">
		<div class="col-md-10">
			<h3>List of Properties</h3>
		</div>
		<div class="col-sm-2">
			<a class="btn btn-sm btn-success" href="{{ route('properties.create') }}"> Enter new property</a>
		</div>
	</div>

	<table class="table table-hover table-sm">
		<tr>
			<th><b>No.</b></th>
			<th>Description</th>
			<th>Address</th>
			{{-- <th>Price</th> --}}
			<th>Status</th>
			<th>Action</th>
		</tr>

		@foreach ($properties as $no => $property)

		<tr>
			<td><b>{{$no + 1}}</b></td>
			<td>{{$property->description}}</td>
			<td>{{$property->address}}</td>
			{{-- <td>RM{{$property->price}}</td> --}}
			<td>{{$property->status}}</td>
			<td>
				<div>
					@if($property->detail_id != null)
						<a href=" {{ url('/detail/create', ['id' => $property->id]) }}" class="btn btn-success disabled">Add Details</a>
					@else
						<a href=" {{ url('/detail/create', ['id' => $property->id]) }}" class="btn btn-success" >Add Details</a>
					@endif
					@if($property->detail_id == null)
						<a href="/details/{{ $property->detail_id }}/edit" class="btn btn-success disabled">Edit Details</a>
					@else
						<a href=" {{ url('/detail/create', ['id' => $property->id]) }}" class="btn btn-success" >Edit Details</a>
					@endif
				</div>
				<br>
				<div>
					<form class="" action="{{route('properties.destroy',$property->id)}}" method="post">
						<a class="btn btn-primary" href="{{route('properties.edit', $property->id)}}">Edit</a>

						@if($property->detail_id !=null)
							<a class="btn btn-warning" href="{{ url('/property/detail',['idD' => $property->detail_id]) }}">Show</a>
						@else
							<a class="btn btn-warning disabled" href="{{ url('/property/detail',['idD' => $property->detail_id]) }}">Show</a>
						@endif

						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger">Delete</button>
					</form>
				</div>
			</td>
		</tr>

		@endforeach
	</table>
</div>

@endsection
