<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Auth App @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Multi-Auth</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    @auth('web')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('user/dashboard') ? 'active' : '' }}" href="/user/dashboard">User Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <form action="/user/logout" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link">Logout</button>
                            </form>
                        </li>
                    @endauth
                    
                    @auth('admin')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="/admin/dashboard">Admin Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <form action="/admin/logout" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link">Logout</button>
                            </form>
                        </li>
                    @endauth
                    
                    {{-- @guest('web')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('user/login') ? 'active' : '' }}" href="/user/login">User Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('user/register') ? 'active' : '' }}" href="/user/register">User Register</a>
                        </li>
                    @endguest
                    
                    @guest('admin')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/login') ? 'active' : '' }}" href="/admin/login">Admin Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/register') ? 'active' : '' }}" href="/admin/register">Admin Register</a>
                        </li>
                    @endguest --}}
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p>&copy; {{ date('Y') }} Multi-Auth App. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>