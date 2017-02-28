@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ol class="breadcrumb">
                <li><a href="/home">Dasboard</a></li>
                <li class="active">Languages</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading"><h4>List of languages</h4></div>

              
                <div class="panel-body">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif
                    <div class="pull-righ">
                        <a href="{{ route('language.create') }}" class="btn btn-primary" role="button">Add language</a>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Date Creted</th>
                            <th>Date Modified</th>
                            <th>Action</th>
                        </tr>

                        @foreach($languages as $language)
                            <tr>
                                <td>{{ $language->id }}</td>
                                <td>{{ $language->name }}</td>
                                <td>{{ $language->created_at }}</td>
                                <td>{{ $language->updated }}</td>
                                <td>
                                    <a href="{{ route('language.show', $language->id) }}" class="btn btn-info">View</a>
                                    <a href="{{ route('language.edit', $language->id) }}" class="btn btn-primary">Edit</a>
                                    
                                     {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['language.destroy', $language->id]
                                    ]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
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