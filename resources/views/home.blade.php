@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ol class="breadcrumb">
                <li class="active">Dashboard</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading"><h3> Welcomme, {{ Auth::user()->first_name }} {{ Auth::user()->surname }}</h3></div>
                <div class="panel-body">
                    <p>Please check options below to manage this tool.</p>
                </div>
                  <!-- List group -->
                  <ul class="list-group">
                    <li class="list-group-item"><a href="/user">List Users</a></li>
                    <li class="list-group-item"><a href="/language">List Languages</a></li>
                  </ul>
            </div>
        </div>
    </div>
</div>
@endsection
