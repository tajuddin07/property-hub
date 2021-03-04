@extends('layouts.app')
@section('content')
<div class="container">
	<div class="col-sm-4">
		<div class="col-lg-12">
			<h3>New Properties</h3>
		</div>
	</div>

	@if ($errors->any())
	<div class="alert alert-dismissable alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong>Error when adding property</strong>
		</div>
	@endif

	<form class="forms-sample" action="{{ route('properties.store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="col-md-12">
			<strong>Picture</strong>
			<input type="file" name="pic" accept="image/*">
		</div>
		<div class="col-md-12">
			<strong>Description</strong>
			<textarea name="description" class="form-control" placeholder="Description"></textarea> 
		</div>
		<div class="col-md-12">
			<label for="address_address">Address</label>
			<input type="text" id="address-input" name="address_address" class="form-control map-input">
			<input type="hidden" name="address_latitude" id="address-latitude" value="0" />
			<input type="hidden" name="address_longitude" id="address-longitude" value="0" />
		</div>
		<br>
		<div id="address-map-container" style="width:100%;height:400px; ">
			<div style="width: 100%; height: 100%" id="address-map"></div>
		</div>
		<br>
		<div class="col-md-12">
			<strong>Price</strong>
			<input type="text" name="price" class="form-control" placeholder="Price"><br>
		</div>
		<div class="col-md-12">
			<button type="submit" class="btn btn-success mr-2">Submit</button>
			<a href="{{ route('properties.index') }}" class="btn btn-danger">Back</a>
		</div>
	</form>
</div>



@endsection

@section('scripts')
@parent
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
<script src="{{ asset('js/mapInput.js') }}" defer></script>
@stop 

