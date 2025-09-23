<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile |📚 Book CRUD</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            background-color: #1a1a2e;
            color: #e0e0e0;
            font-family: 'Inter', 'Segoe UI', Roboto, sans-serif;
        }

        .dashboard-header {
            background: linear-gradient(135deg, #8e2de2, #4a00e0);
            color: #f8f9fa;
            text-align: center;
            padding: 3rem 1rem;
            border-radius: 0 0 1rem 1rem;
            margin-bottom: 2rem;
        }

        .app-card {
            background-color: #2c2c4d;
            border-radius: 1rem;
            box-shadow: 0 0.75rem 1.5rem rgba(0,0,0,0.6);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .app-card-header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #44446e;
        }

        .app-card-header h4 {
            color: #f8f9fa;
            margin: 0;
        }

        .app-card-body {
            padding: 2rem;
        }

        .form-control {
            border-radius: 0.5rem;
            background-color: #3a3a5e;
            border: 1px solid #44446e;
            color: #e0e0e0;
        }

        .form-control:focus {
            border-color: #8e2de2;
            background-color: #4a4a75;
            color: #f8f9fa;
            box-shadow: 0 0 0 0.25rem rgba(142, 45, 226, 0.2);
        }

        .btn-primary {
            background: linear-gradient(90deg, #8e2de2, #4a00e0);
            border: none;
        }

        .btn-primary:hover {
            opacity: 0.9;
        }

        .verification-alert {
            background-color: #3a3a5e;
            padding: 1rem;
            border-radius: 0.5rem;
            margin-top: 1rem;
        }

        .alert-success {
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        .text-danger {
            font-size: 0.875rem;
        }
    </style>
</head>
<body>

<header class="dashboard-header">
    <p>Manage your account settings and update your information.</p>
</header>

<main class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">

                <div class="app-card">
                    <div class="app-card-header">
                        <h4>{{ __('Profile Information') }}</h4>
                    </div>
                    <div class="app-card-body">
                        <p class="text-secondary mb-4">
                            {{ __("Update your account's profile information and email address.") }}
                        </p>

                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>

                        <form method="post" action="{{ route('profile.update') }}">
                            @csrf
                            @method('patch')

                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input id="name" name="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', Auth::user()->name) }}" required autofocus />
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input id="email" name="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', Auth::user()->email) }}" required />
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                @if (Auth::user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! Auth::user()->hasVerifiedEmail())
                                    <div class="verification-alert">
                                        <p>{{ __('Your email address is unverified.') }}</p>
                                        <button form="send-verification" class="btn btn-outline-warning btn-sm">
                                            <i class="fas fa-paper-plane me-1"></i> {{ __('Resend Verification Email') }}
                                        </button>
                                        @if (session('status') === 'verification-link-sent')
                                            <div class="alert alert-success">
                                                {{ __('A new verification link has been sent.') }}
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> {{ __('Save') }}</button>

                            @if (session('status') === 'profile-updated')
                                <span class="text-success ms-2" id="save-message">{{ __('Saved.') }}</span>
                                <script>
                                    setTimeout(() => document.getElementById('save-message').style.display = 'none', 2000);
                                </script>
                            @endif
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
