<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Content -->
    <section class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="card shadow-lg border-0 rounded-3 overflow-hidden">
                        <div class="row g-0">
                            <!-- Image column (hidden on small screens) -->
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                                    alt="Sample photo"
                                    class="img-fluid h-100 w-100"
                                    style="object-fit: cover;" />
                            </div>
                            <!-- Form column -->
                            <div class="col-12 col-lg-6">
                                <div class="card-body p-4 p-md-5">
                                    <h3 class="mb-4 text-center">Login</h3>
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf

                                        <!-- Email -->
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" id="email" name="email" class="form-control" 
                                                value="{{ old('email') }}" required autofocus autocomplete="username">
                                            <x-input-error :messages="$errors->get('email')" class="text-danger small mt-1" />
                                        </div>

                                        <!-- Password -->
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" id="password" name="password" class="form-control"
                                                required autocomplete="current-password">
                                            <x-input-error :messages="$errors->get('password')" class="text-danger small mt-1" />
                                        </div>

                                        <!-- Remember Me -->
                                        <div class="form-check mb-3">
                                            <input type="checkbox" id="remember_me" name="remember" class="form-check-input">
                                            <label for="remember_me" class="form-check-label">Remember me</label>
                                        </div>

                                        <!-- Forgot password + Submit -->
                                        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" class="small">Forgot your password?</a>
                                            @endif
                                        </div>

                                        <div class="d-grid mb-3">
                                            <button type="submit" class="btn btn-primary">Log in</button>
                                        </div>

                                        <div class="text-center">
                                            <a href="/register" class="small">I don't have an account</a>
                                        </div>

                                    </form>
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
