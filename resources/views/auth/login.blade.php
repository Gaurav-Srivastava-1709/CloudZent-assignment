<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | 📚 Book CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --success-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            --card-shadow: 0 15px 35px rgba(50, 50, 93, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07);
        }

        body {
            background: var(--primary-gradient);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='80' height='80' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='40' cy='40' r='38' fill='none' stroke='%23fff' stroke-opacity='0.05' stroke-width='2'/%3E%3C/svg%3E");
            z-index: -1;
        }

        .card {
            border-radius: 20px;
            border: none;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: #fff;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 45px rgba(50, 50, 93, 0.15), 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .card-body h3 {
            background: var(--secondary-gradient);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .btn-login {
            background: var(--accent-gradient);
            border: none;
            border-radius: 50px;
            padding: 12px 30px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(79, 172, 254, 0.3);
        }

        .btn-login:hover {
            background: var(--secondary-gradient);
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(245, 87, 108, 0.4);
        }

        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 2px solid #eef2f7;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #764ba2;
            box-shadow: 0 0 0 0.25rem rgba(118, 75, 162, 0.25);
        }

        .form-label {
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 8px;
        }

        .image-container {
            position: relative;
            overflow: hidden;
        }

        .image-container::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: var(--primary-gradient);
            opacity: 0.7;
            z-index: 1;
        }

        .image-container img {
            filter: brightness(0.9);
            transition: transform 0.5s ease;
        }

        .card:hover .image-container img {
            transform: scale(1.05);
        }

        .book-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 2rem;
            color: white;
            z-index: 2;
        }

        .welcome-text {
            position: absolute;
            bottom: 30px;
            left: 30px;
            color: white;
            z-index: 2;
        }

        .welcome-text h4 {
            font-weight: 700;
            margin-bottom: 5px;
        }

        .form-check-input:checked {
            background-color: #764ba2;
            border-color: #764ba2;
        }

        a {
            color: #667eea;
            font-weight: 500;
            transition: color 0.3s ease;
            text-decoration: none;
        }

        a:hover {
            color: #764ba2;
        }

        .input-group-text {
            background: transparent;
            border: 2px solid #eef2f7;
            border-right: none;
            border-radius: 10px 0 0 10px;
        }

        .input-group .form-control {
            border-left: none;
            border-radius: 0 10px 10px 0;
        }

        .error-message {
            font-size: 0.875rem;
            margin-top: 5px;
        }

        @media (max-width: 991.98px) {
            .image-container {
                height: 200px;
            }
            .welcome-text { bottom: 15px; left: 15px; font-size: 14px; }
            .book-icon { top: 15px; right: 15px; font-size: 1.5rem; }
        }

        @media (max-width: 575.98px) {
            .card-body { padding: 1.5rem; }
            .btn-login { width: 100%; }
        }
    </style>
</head>

<body>
    
    <section class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7">
                    <div class="card shadow-lg border-0">
                        <div class="row g-0">
                            <!-- Image column -->
                            <div class="col-lg-6 d-none d-lg-block image-container">
                                <i class="fas fa-book-open book-icon"></i>
                                <div class="welcome-text">
                                    <h4>Welcome Back!</h4>
                                    <p>Access your Book CRUD account</p>
                                </div>
                                <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&w=1000&q=80"
                                    alt="Books illustration" class="img-fluid h-100 w-100" style="object-fit: cover;" />
                            </div>

                            <!-- Form column -->
                            <div class="col-12 col-lg-6 bg-white">
                                <div class="card-body p-4 p-md-5">
                                    <h3 class="mb-4">Login to Book CRUD</h3>
                                    <form action="{{ secure_url(route('login')) }}" method="POST">
                                        @csrf
                                        <!-- Email -->
                                        <div class="mb-4">
                                            <label for="email" class="form-label">Email Address</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                <input type="email" id="email" name="email" class="form-control"
                                                    value="{{ old('email') }}" required autofocus autocomplete="username"
                                                    placeholder="Enter your email">
                                            </div>
                                            <x-input-error :messages="$errors->get('email')" class="text-danger error-message" />
                                        </div>

                                        <!-- Password -->
                                        <div class="mb-4">
                                            <label for="password" class="form-label">Password</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                <input type="password" id="password" name="password" class="form-control"
                                                    required autocomplete="current-password"
                                                    placeholder="Enter your password">
                                            </div>
                                            <x-input-error :messages="$errors->get('password')" class="text-danger error-message" />
                                        </div>

                                        <!-- Remember Me -->
                                        <div class="form-check mb-4">
                                            <input type="checkbox" id="remember_me" name="remember" class="form-check-input">
                                            <label for="remember_me" class="form-check-label">Remember me</label>
                                        </div>

                                        <!-- Submit -->
                                        <div class="d-grid mb-4">
                                            <button type="submit" class="btn btn-login py-2">
                                                <i class="fas fa-sign-in-alt me-2"></i>Log in
                                            </button>
                                        </div>

                                        <!-- Links -->
                                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}">
                                                    <i class="fas fa-key me-1"></i>Forgot your password?
                                                </a>
                                            @endif
                                            <a href="/register"><i class="fas fa-user-plus me-1"></i>Create an account</a>
                                            
                                        </div>
                                    </form>
                                                    <div class="text-center mt-3">
                    <a href="/"  class="back-link">
                        <i class="fas fa-arrow-left me-2"></i>Back to Home Page
                    </a>
                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
