@extends('layouts.app')
@section('content')

<!-- List of Complaint -->
<div class="container">
	<div class="row">
		<div class="col-md-10">
			<h3>List of Reports</h3>
		</div>
	</div>

	<table class="table table-striped">
		<tr>
			<td>No.</td>
			<td>From</td>
			<td>Complaint</td>
		</tr>
		@foreach ($reports as $no => $report)
		<tr>
			
				<td>{{ $no + 1 }}</td>
				<td>{{ $report->name }}</td>
				<td>{{ $report->description }}</td>
			
		</tr>
		@endforeach
	</table>
</div>
@endsection