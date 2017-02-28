@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
                </div>

                    {!! Form::open([
                        'url' => 'language',
                        'class' => 'form-horizontal',
                        'role' => 'form',
                    ]) !!}
                <div class="panel-body">    
                    <div class="form-group">
                        {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
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
