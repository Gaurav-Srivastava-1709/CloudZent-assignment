<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Content -->
    <section class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                        <div class="row g-0">
                            <!-- Image column (hidden on small screens) -->
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                                    alt="Register illustration"
                                    class="img-fluid h-100 w-100"
                                    style="object-fit: cover;" />
                            </div>

                            <!-- Form column -->
                            <div class="col-12 col-lg-6 bg-white">
                                <div class="card-body p-4 p-md-5">
                                    <h3 class="mb-4 text-center fw-bold text-primary">Create Account</h3>
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf

                                        <!-- Name -->
                                        <div class="mb-3">
                                            <label for="name" class="form-label fw-semibold">Full Name</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                value="{{ old('name') }}" required autofocus autocomplete="name">
                                            <x-input-error :messages="$errors->get('name')" class="text-danger small mt-1" />
                                        </div>

                                        <!-- Email -->
                                        <div class="mb-3">
                                            <label for="email" class="form-label fw-semibold">Email Address</label>
                                            <input type="email" id="email" name="email" class="form-control"
                                                value="{{ old('email') }}" required autocomplete="username">
                                            <x-input-error :messages="$errors->get('email')" class="text-danger small mt-1" />
                                        </div>

                                        <!-- Password -->
                                        <div class="mb-3">
                                            <label for="password" class="form-label fw-semibold">Password</label>
                                            <input type="password" id="password" name="password" class="form-control"
                                                required autocomplete="new-password">
                                            <x-input-error :messages="$errors->get('password')" class="text-danger small mt-1" />
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                                            <input type="password" id="password_confirmation" name="password_confirmation"
                                                class="form-control" required autocomplete="new-password">
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger small mt-1" />
                                        </div>

                                        <!-- Buttons -->
                                        <div class="d-flex justify-content-between align-items-center mt-4">
                                            <a href="{{ route('login') }}" class="text-decoration-none small text-muted">
                                                Already registered?
                                            </a>
                                            <button type="submit" class="btn btn-primary px-4 py-2 rounded-3">
                                                Register
                                            </button>
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
