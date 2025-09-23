<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Password |📚 Book CRUD</title>
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
            margin-bottom: 2rem;
        }

        .app-card-header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #44446e;
        }

        .app-card-header h4 {
            margin: 0;
            color: #f8f9fa;
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
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
        }

        .btn-primary:hover {
            opacity: 0.9;
        }

        .text-danger {
            font-size: 0.85rem;
        }
    </style>
</head>
<body>
    <main class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">

                    <!-- Update Password Card -->
                    <div class="app-card">
                        <div class="app-card-header">
                            <h4><i class="fas fa-lock me-2"></i> {{ __('Update Password') }}</h4>
                        </div>
                        <div class="app-card-body">
                            <p class="text-secondary mb-4">
                                {{ __('Ensure your account is using a long, random password to stay secure.') }}
                            </p>

                            <!-- Update Password Form -->
                            <form method="post" action="{{ route('password.update') }}">
                                @csrf
                                @method('put')

                                <!-- Current Password -->
                                <div class="mb-3">
                                    <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
                                    <input type="password" 
                                           class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" 
                                           id="current_password" 
                                           name="current_password" 
                                           autocomplete="current-password">
                                    @error('current_password', 'updatePassword')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- New Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('New Password') }}</label>
                                    <input type="password" 
                                           class="form-control @error('password', 'updatePassword') is-invalid @enderror" 
                                           id="password" 
                                           name="password" 
                                           autocomplete="new-password">
                                    @error('password', 'updatePassword')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                    <input type="password" 
                                           class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror" 
                                           id="password_confirmation" 
                                           name="password_confirmation" 
                                           autocomplete="new-password">
                                    @error('password_confirmation', 'updatePassword')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit Button + Status -->
                                <div class="d-flex align-items-center">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i> {{ __('Save') }}
                                    </button>

                                    @if (session('status') === 'password-updated')
                                        <span class="ms-3 text-success fw-bold">
                                            <i class="fas fa-check-circle me-1"></i> {{ __('Saved.') }}
                                        </span>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Update Password Card -->

                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
