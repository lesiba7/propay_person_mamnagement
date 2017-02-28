@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ol class="breadcrumb">
                <li><a href="/home">Dasboard</a></li>
                <li><a href="/user">Users</a></li>
                <li class="active">Add User</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Add Language</div>
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
                    
                    {!! Form::open([
                        'url' => 'user',
                        'class' => 'form-horizontal',
                        'role' => 'form',
                    ]) !!}
                    
                    {{ csrf_field() }}
                </div>
                 <div class="panel-body">
                    <div class="form-group">
                        {!! Form::label('first_name', 'First Name:', ['class' => 'control-label']) !!}
                        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                    </div>

                     <div class="form-group">
                        {!! Form::label('surname', 'Surnname:', ['class' => 'control-label']) !!}
                        {!! Form::text('surname', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('dob', 'Birth Date:', ['class' => 'control-label']) !!}
                        {{ Form::text('dob',null,['class'=>'form-control', 'id'=>'datepicker']) }}
                    </div>

                     <div class="form-group">
                        {!! Form::label('langauge', 'Language:', ['class' => 'control-label']) !!}
                        <select id ="language" class="form-control" for="language" name="language" required autofocus>
                            @foreach ($languages as $language)
                                @foreach($language as $lan)
                                    <option value="{{ $lan['id'] }}">{{ $lan['name'] }}</option>
                                @endforeach
                            @endforeach                                 
                        </select>
                    </div>

                    <div class="form-group">
                        {!! Form::label('mobile', 'Mobile:', ['class' => 'control-label']) !!}
                        {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    </div>
                    <hr>
                    <div class="form-group">
                        {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
                        {!! Form::password('password', null, ['class' => 'form-control','type'=>'password']) !!}
                    </div>

                     <div class="form-group">
                        {!! Form::label('password_confirmation', 'Confirm Password:', ['class' => 'control-label']) !!}
                        {!! Form::password('password_confirmation', null, ['class' => 'form-control', 'type'=>'password']) !!}
                    </div>
                    <div class="form-group">

                        {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


