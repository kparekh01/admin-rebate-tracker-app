@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    <h1><a href="{{ url('/auth/login') }}">Login as User</a></h1>
                    <h1><a href="{{ url('/admin/login') }}">Login as Admin</a></h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
