@extends('base')

@section('content')
<br>
<h1>Dashboard</h1>

<div class="row">
    <div class="col-md-4">
        <div class="card" style="height: 250px">
            <div class="card-header bg-info text-white">
                <h4>User Profile</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm table-striped">
                    <tr>
                        <th>Name</th><td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <th>Email</th><td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="{{url('/user/' . $user->id . '/change-password')}}" class="btn btn-warning btn-sm">Change Password</a>
                            <a href="{{url('/user/' . $user->id . '/edit')}}" class="btn btn-info btn-sm">Edit Profile</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card" style="height: 250px">
            <div class="card-header bg-success text-white">
                <h4>
                    <a href="{{url('/events/create')}}" class="btn btn-light btn-sm float-right">
                        <i class="fa fa-plus"></i>
                    </a>
                    Events
                </h4>
            </div>
            <div class="card-body">
                <a href="{{url('/events')}}" class="text-success" style="text-decoration: none">
                    <div style="font-size: 4.5em; text-align:center; font-weight:900">{{$eventCount}}</div>
                    <div style="font-size: 1.5em; text-align:center; margin-top: -20px">Accomplished</div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" style="height: 250px">
            <div class="card-header bg-primary text-white">
                <h4>
                    <a href="{{url('/certificates/create')}}" class="btn btn-light btn-sm float-right">
                        <i class="fa fa-plus"></i>
                    </a>
                    Certificates
                </h4>
            </div>
            <div class="card-body">
                <span class="text-primary">
                    <div style="font-size: 4.5em; text-align:center; font-weight:900">{{$certCount}}</div>
                    <div style="font-size: 1.5em; text-align:center; margin-top: -20px">Issued</div>
                </span>
            </div>
        </div>
    </div>
</div>
@endsection
