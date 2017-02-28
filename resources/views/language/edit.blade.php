@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<ol class="breadcrumb">
                <li><a href="/home">Dasboard</a></li>
                <li><a href="/language">Languages</a></li>
                <li class="active">Edit : {{ $language->name }}</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Update Language</h4></div>
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
					{{ Form::model($language, ['method'=>'PATCH', 'route'=>['language.update', $language->id]]) }}

					<div class="form-group">
					{{ Form::label('name','Name') }}
					{{ Form::text('name',null,['class'=>'form-control']) }}
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
