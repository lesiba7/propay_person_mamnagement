@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ol class="breadcrumb">
                <li><a href="/home">Dashboard</a></li>
                <li><a href="/user">Users</a></li>
                <li class="active">{{ $user->first_name }}</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading"><h4>View User Details : {{ $user->first_name }}  {{ $user->surname }}</h4></div>
                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
                <div class="panel-body">
                    <div class="pull-righ">
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary" role="button">Edit</a>
                    </div>
                </div>
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>ID</th>
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <th>First Name</th>
                        <td>{{ $user->first_name }}</td>
                    </tr>
                    <tr>
                        <th>Surname</th>
                        <td>{{ $user->surname }}</td>
                    </tr>
                    <tr>
                        <th>Mobile</th>
                        <td>{{ $user->mobile }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Language</th>
                        <td>{{ $user->lan }}</td>
                    </tr>
                    <tr>
                        <th>Birth Date</th>
                        <td>{{ $user->dob }}</td>
                    </tr>

                    <tr>
                        <th>Role</th>
                        <td>{{ $user->user_role }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><span class="label label-default">{{ $user->user_status }}</span></td>
                    </tr>
                    <tr>
                        <th>Date Created</th>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                     <tr>
                        <th>Date Updated</th>
                        <td>{{ $user->updated_at }}</td>
                    </tr>
                    <tr>
                        <td><</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection