@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-4 mb-4">Welcome to Our Application</h1>
            <p class="lead mb-5">A powerful multi-auth application built with Laravel</p>
            
            <div class="row d-flex justify-content-center">
                @guest('web')
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h3 class="card-title">User Account</h3>
                            <p class="card-text">Access regular user features and dashboard</p>
                            <a href="/user/login" class="btn btn-primary me-2">User Login</a>
                            <a href="/user/register" class="btn btn-outline-primary">User Register</a>
                        </div>
                    </div>
                </div>
                @endguest
                
                @auth('web')
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h3 class="card-title">Welcome Back, User!</h3>
                            <p class="card-text">You are logged in as {{ Auth::guard('web')->user()->name }}</p>
                            <a href="/user/dashboard" class="btn btn-primary me-2">Go to Dashboard</a>
                            <form action="/user/logout" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endauth
            </div>
            
            <div class="mt-5">
                <h2 class="mb-4">Application Features</h2>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Secure Authentication</h5>
                                <p class="card-text">Multiple authentication systems with proper security measures.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Separate Dashboards</h5>
                                <p class="card-text">Different interfaces for regular users and administrators.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Responsive Design</h5>
                                <p class="card-text">Works perfectly on all devices from mobile to desktop.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection