@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ol class="breadcrumb">
                <li><a href="/home">Dashboard</a></li>
                <li class="active">Users</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading"><h4>List of User</h4></div>

               
                <div class="panel-body">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif

                    <div class="pull-righ">
                        <a href="{{ route('user.create') }}" class="btn btn-primary" role="button">Add User</a>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Surname</th>
                            <th>Date Creted</th>
                            <th>Action</th>
                        </tr>

                        @foreach($user as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->surname }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-info">View</a>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                    @if(Auth::user()->id != $user->id)
                                         {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['user.destroy', $user->id]
                                        ]) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endif
                                </td>
                            </tr> 
                        @endforeach  
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection