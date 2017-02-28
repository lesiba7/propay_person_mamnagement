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
					{{ Form::label('first_name','Name') }}
					{{ Form::text('first_name',null,['class'=>'form-control']) }}
					</div>

					<div class="form-group">
					{{ Form::label('surname','Surname') }}
					{{ Form::text('surname',null,['class'=>'form-control']) }}
					</div>

					<div class="form-group">
					{{ Form::label('mobile','Mobile') }}
					{{ Form::text('mobile',null,['class'=>'form-control']) }}
					</div>

					<div class="form-group">
					{{ Form::label('language','Language') }}
						<select name="language" class="form-control"  for="language" id="language">
							@foreach($user->lan as $lan)
								@foreach($lan as $la)
						        	<option value="{{ $la['id'] }}" {{ $user->current_lan == $la['id'] ? 'selected="selected"' : '' }}>{{ $la['name'] }}</option>    
						        @endforeach
						   	@endforeach
						</select>
					</div>


					<div class="form-group">
					{{ Form::label('dob','Birth Date') }}
					{{ Form::text('dob',null,['class'=>'form-control', 'id'=>'datepicker']) }}
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
