@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ol class="breadcrumb">
                <li><a href="/home">Dasboard</a></li>
                <li><a href="/language">Languages</a></li>
                <li class="active">{{ $language->name }}</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading"><h4>{{ $language->name }}<h4></div>
                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif

                <div class="panel-body">
                    <div class="pull-righ">
                        <a href="{{ route('language.edit', $language->id) }}" class="btn btn-primary" role="button">Edit</a>
                    </div>
                </div>
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>ID</th>
                        <td>{{ $language->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $language->name }}</td>
                    </tr>
                    <tr>
                        <th>Date Created</th>
                        <td>{{ $language->created_at }}</td>
                    </tr>
                     <tr>
                        <th>Date Updated</th>
                        <td>{{ $language->updated_at }}</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </table>
                
            </div>
        </div>
    </div>
</div>
@endsection