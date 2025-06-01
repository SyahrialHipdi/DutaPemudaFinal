@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
                <div class="card-body">
                    <p>Welcome, {{ Auth::guard('admin')->user()->name }}!</p>
                    <p>You are logged in as an administrator.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection