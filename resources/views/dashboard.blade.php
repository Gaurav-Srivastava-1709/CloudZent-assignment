<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | 📚 Book CRUD</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            background-color: #f0f2f5; /* Light gray background */
            color: #343a40; /* Darker text color */
        }

        .navbar {
            background-color: #ffffff !important; /* White navbar background */
            border-bottom: 1px solid #e0e0e0;
        }

        .navbar-brand img {
            height: 32px;
            margin-right: 8px;
        }

        .navbar-nav .nav-link {
            color: #495057;
            font-weight: 500;
            padding-right: 1rem;
            padding-left: 1rem;
        }

        .navbar-nav .nav-link.active {
            color: #007bff; /* Bootstrap primary blue */
            border-bottom: 2px solid #007bff;
        }

        .navbar-nav .nav-link:hover {
            color: #0056b3; /* Darker blue on hover */
        }

        .dropdown-menu {
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #007bff;
        }

        .dashboard-header {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%); /* Blue gradient */
            color: white;
            padding: 2rem 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 3rem;
            text-align: center;
        }
        
        .dashboard-header h2 {
            font-weight: 700;
            font-size: 2.5rem;
        }

        .dashboard-card {
            border: none;
            border-radius: 0.75rem; /* Rounded corners */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); /* Soft shadow */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 2rem;
            background-color: #ffffff;
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
        
        .card-body {
            padding: 2rem;
        }
        
        .welcome-message {
            font-size: 1.15rem;
            color: #495057;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }
        
        .btn-custom-primary {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%); /* Blue gradient button */
            border: none;
            padding: 0.85rem 1.75rem;
            border-radius: 0.5rem;
            font-weight: 600;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .btn-custom-primary:hover {
            opacity: 0.9;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
            color: white; /* Keep text white on hover */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .dashboard-header {
                padding: 1.5rem 0;
                margin-bottom: 2rem;
            }
            .dashboard-header h2 {
                font-size: 2rem;
            }
            .card-body {
                padding: 1.5rem;
            }
            .welcome-message {
                font-size: 1rem;
            }
            .navbar-brand img {
                height: 28px;
            }
        }
        
        @media (max-width: 576px) {
            .dashboard-header h2 {
                font-size: 1.8rem;
            }
            .card-body {
                padding: 1rem;
            }
            .btn-custom-primary {
                width: 100%;
                text-align: center;
                padding: 0.75rem 1rem;
                font-size: 0.95rem;
            }
            .navbar-nav .nav-link {
                padding: 0.5rem 1rem;
            }
            .navbar-nav .nav-link.active {
                border-bottom: none;
                border-left: 3px solid #007bff;
                padding-left: calc(1rem - 3px);
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid container-xl"> <!-- Use container-xl for wider content on large screens -->
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
                 <a class="h5 mb-0 text-dark fw-bold navbar-brand fw-bold" href="{{ url('/') }}">📚 Book CRUD</a>
            </a>

            <!-- Toggler for responsive navigation -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Primary Navigation Links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" 
                           href="{{ route('dashboard') }}">
                            <i class="fas fa-tachometer-alt me-1"></i> Dashboard
                        </a>
                    </li>
                </ul>

                <!-- Settings Dropdown -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-2"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fas fa-user-edit me-2"></i> Profile
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <!-- Authentication -->
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt me-2"></i> Log Out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Header Section -->
    <header class="dashboard-header">
        <div class="container container-xl">
            <h2 class="mb-0">{{ __('Dashboard') }}</h2>
        </div>
    </header>

    <!-- Main Content -->
    <main class="py-5">
        <div class="container container-xl">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <!-- Welcome Card -->
                    <div class="dashboard-card">
                        <div class="card-body text-center">
                            <i class="fas fa-hand-sparkles fa-3x text-primary mb-3"></i>
                            <p class="welcome-message fw-semibold">  
                                {{ __("You're logged in!") }} Welcome back to your dashboard.
                            </p>
                            <a href="{{ route('books.index') }}" class="btn btn-custom-primary">
                                <i class="fas fa-book me-2"></i> See The List Of The Books
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>