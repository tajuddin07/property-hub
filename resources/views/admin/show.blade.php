@extends('layouts.app')
@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-10">
            <h3>Admin Details</h3>
        </div>
    </div>
    <br>
    <center>
        <div class="col-md-6 col-lg-6">
            <div class="card bg-light">
                <div class="card-header">Admins</div>
                <div class="card-body">
                    <table class="list-group" cellpadding="0">
                        <tr>
                            <div class="col-md-4">
                                <td rowspan="1"><img src="/uploads/avatars/{{$admin->picture}}" style="width:62%;"></td>
                            </div>
                            <div class="col-md-8">
                                <td>
                                    <ul class="list-group" style="margin-left: -75px;">
                                        <li class="list-group-item text-left">Name: {{ $admin->name }}</li>
                                        <li class="list-group-item text-left">Email: {{ $admin->email }}</li>
                                        <li class="list-group-item text-left">Phone Number: {{ $admin->phone_no }}</li>
                                    </ul>
                                </td>
                            </div>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </center>
</div>

@endsection