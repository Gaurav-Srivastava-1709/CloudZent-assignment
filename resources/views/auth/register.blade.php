<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register | 📚 Book CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    /* ---------------- Root Variables ---------------- */
    :root {
      --primary-color: #2c3e50;
      --accent-color: #d4a017;
      --text-dark: #2c2c2c;
      --gradient-bg: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
      --gradient-accent: linear-gradient(135deg, #f7c948 0%, #d4a017 100%);
      --gradient-card: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    }

    /* ---------------- Body ---------------- */
    body {
      background: var(--gradient-bg);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: var(--text-dark);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      padding: 20px;
    }

    /* ---------------- Logo ---------------- */
    .logo {
      font-size: 26px;
      font-weight: bold;
      color: white;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 10px;
      position: absolute;
      top: 20px;
      left: 20px;
      z-index: 10;
    }

    .logo i {
      font-size: 30px;
    }

    /* ---------------- Card ---------------- */
    .card {
      border: none;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      background: var(--gradient-card);
      transition: all 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
    }

    /* ---------------- Image Column ---------------- */
    .image-column {
      background: linear-gradient(135deg, #2c3e50, #4a6491);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
      color: white;
      text-align: center;
      min-height: 100%;
    }

    .image-column i {
      font-size: 70px;
      margin-bottom: 20px;
    }

    .image-column h2 {
      font-size: 26px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .image-column p {
      font-size: 15px;
      opacity: 0.9;
      line-height: 1.5;
    }

    /* ---------------- Form Column ---------------- */
    .form-header h3 {
      font-size: 26px;
      font-weight: 700;
      background: linear-gradient(135deg, #2c3e50, #4a6491);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 5px;
    }

    .form-header p {
      font-size: 15px;
      color: #6c757d;
      margin-bottom: 20px;
    }

    .form-control {
      border-radius: 8px;
      padding: 12px 15px;
      border: 1px solid #ddd;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      border-color: var(--accent-color);
      box-shadow: 0 0 0 0.2rem rgba(212, 160, 23, 0.25);
    }

    .btn-primary {
      background: var(--gradient-accent);
      border: none;
      border-radius: 8px;
      padding: 12px 30px;
      font-weight: bold;
      color: var(--text-dark);
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(212, 160, 23, 0.4);
    }

    .login-link {
      color: var(--primary-color);
      font-weight: 600;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .login-link:hover {
      color: var(--accent-color);
    }

    .back-link {
      color: #6c757d;
      font-weight: 500;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .back-link:hover {
      color: var(--accent-color);
    }

    .text-danger {
      font-size: 0.8rem;
      margin-top: 4px;
      display: block;
    }

    /* ---------------- Responsive ---------------- */
    @media (max-width: 992px) {
      .image-column {
        min-height: 200px;
        padding: 30px 15px;
      }

      .image-column i {
        font-size: 50px;
      }

      .form-header h3 {
        font-size: 22px;
      }
    }

    @media (max-width: 576px) {
      .card {
        flex-direction: column;
      }

      .image-column {
        width: 100%;
        text-align: center;
      }

      .form-header h3 {
        font-size: 20px;
      }

      .form-header p {
        font-size: 14px;
      }

      .btn-primary {
        width: 100%;
      }
    }
  </style>
</head>

<body>
  <!-- Logo -->
  <a href="/" class="logo">
     📚 Book CRUD
  </a>

  <!-- Content -->
  <section class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 col-xl-7">
          <div class="card d-flex flex-row flex-wrap">
            <!-- Image Column -->
            <div class="col-lg-5 image-column">
              <i class="fas fa-user-plus"></i>
              <h2>Join Our Community</h2>
              <p>Discover and share amazing books with fellow readers around the world.</p>
            </div>

            <!-- Form Column -->
            <div class="col-12 col-lg-7 bg-white">
              <div class="card-body p-4 p-md-5">
                <div class="form-header text-center">
                  <h3>Create Your Account</h3>
                  <p>Fill in your details to get started</p>
                </div>

                <form action="{{ route('register') }}" method="POST">
                  @csrf

                  <!-- Name -->
                  <div class="mb-3">
                    <input type="text" id="name" name="name" class="form-control"
                      value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Full Name">
                    <x-input-error :messages="$errors->get('name')" class="text-danger" />
                  </div>

                  <!-- Email -->
                  <div class="mb-3">
                    <input type="email" id="email" name="email" class="form-control"
                      value="{{ old('email') }}" required autocomplete="username" placeholder="Email Address">
                    <x-input-error :messages="$errors->get('email')" class="text-danger" />
                  </div>

                  <!-- Password -->
                  <div class="mb-3">
                    <input type="password" id="password" name="password" class="form-control"
                      required autocomplete="new-password" placeholder="Password">
                    <x-input-error :messages="$errors->get('password')" class="text-danger" />
                  </div>

                  <!-- Confirm Password -->
                  <div class="mb-3">
                    <input type="password" id="password_confirmation" name="password_confirmation"
                      class="form-control" required autocomplete="new-password" placeholder="Confirm Password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger" />
                  </div>

                  <!-- Buttons -->
                  <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap">
                    <a href="{{ route('login') }}" class="login-link mb-2">
                      <i class="fas fa-sign-in-alt"></i> Already registered?
                    </a>
                    <button type="submit" class="btn btn-primary">
                      Register <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                  </div>
                </form>

                <div class="text-center mt-3">
                  <a href="/" class="back-link">
                    <i class="fas fa-arrow-left me-2"></i>Back to Home Page
                  </a>
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
