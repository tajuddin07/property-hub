@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3>Edit Properties</h3>
        </div>
    </div>

    <form class="forms-sample" method="post" action="{{ route('properties.update', ['prop' => $property->id]) }}"
        enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
            <strong>Picture</strong>
            <input type="file" name="pic" accept="image/*" value="{{$property->picture}}">
        </div>
        <div class="col-md-12">
            <strong>Description</strong>
            <textarea name="description" class="form-control" placeholder="Description"
                value="{{$property->description}}">{{$property->description}}</textarea>
        </div>
        <div class="col-md-12">
            <label for="address_address">Address</label>
            <input type="text" id="address-input" name="address_address" class="form-control map-input"
                value="{{$property->address}}">
            <input type="hidden" name="address_latitude" id="address-latitude" value="{{$property->lat}}" />
            <input type="hidden" name="address_longitude" id="address-longitude" value="{{$property->lng}}" />
        </div>
        <br>
        <div id="address-map-container" style="width:100%;height:400px; ">
            <div style="width: 100%; height: 100%" id="address-map"></div>
        </div>
        <br>
        <div class="col-md-12">
            <strong>Price</strong>
            <input type="text" name="price" class="form-control" placeholder="Price" value="{{$property->price}}"><br>
        </div>

        <div class="col-md-12">
            <strong>Status: </strong>
            <select id="status" name="status" class="form-control">
                <option value="Available">Available</option>
                <option value="Sold">Sold</option>
            </select>
        </div><br>

        <div class="col-md-12">
            <button type="submit" class="btn btn-success mr-2">Submit</button>
            <a href="{{route('properties.index')}}" class="btn btn-danger">Back</a>
        </div>
    </form>

</div>
@endsection

@section('scripts')
@parent
<script
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize"
    async defer></script>
<script src="{{ asset('js/mapInput.js') }}" defer></script>
@stop

@section('scriptsEdit')
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@stop