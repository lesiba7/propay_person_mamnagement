@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<ol class="breadcrumb">
                <li><a href="/home">Dashboard</a></li>
                <li><a href="/user">Users</a></li>
                <li class="active">Edit : {{ $user->first_name }}</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Update User</h4></div>
                <div class="panel-body">
	                @if($errors->any())
					    <div class="alert alert-danger">
					        @foreach($errors->all() as $error)
					            <p>{{ $error }}</p>
					        @endforeach
					    </div>
					@endif
					@if(Session::has('flash_message'))
					    <div class="alert alert-success">
					        {{ Session::get('flash_message') }}
					    </div>
					@endif
					{{ Form::model($user, ['method'=>'PATCH', 'route'=>['user.update', $user->id]]) }}

					<div class="form-group">
					{{ Form::label('old_password','Current Password') }}
					{{ Form::password('old_password', ['class'=>'form-control']) }}
					</div>

					<div class="form-group">
					{{ Form::label('password','New Password') }}
					{{ Form::password('password', ['class'=>'form-control']) }}
					</div>

					<div class="form-group">
					{{ Form::label('confrim_password','Confirm Password') }}
					{!! Form::password('password_confirmation', ['class'=>'form-control']) !!
					</div>

					
					<div class="form-group">
					{{ Form::submit('Update',['class'=>'btn btn-primary']) }}
					{{ Form::close() }}
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
