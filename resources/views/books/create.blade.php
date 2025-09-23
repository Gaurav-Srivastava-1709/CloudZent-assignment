<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --success-color: #2ecc71;
            --gradient-start: #3498db;
            --gradient-end: #2c3e50;
        }
        
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /* Enhanced gradient background */
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            padding: 20px;
        }

        .card-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .card-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--gradient-start), var(--gradient-end));
        }

        .card-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
        }

        h1 {
            color: var(--dark-color);
            font-weight: 700;
            font-size: 2rem;
            text-align: center;
            margin-bottom: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            padding-bottom: 15px;
        }

        h1::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 25%;
            width: 50%;
            height: 3px;
            background: linear-gradient(90deg, var(--gradient-start), var(--gradient-end));
            border-radius: 3px;
        }

        h1 .icon {
            margin-right: 10px;
            font-size: 1.8rem;
            color: var(--primary-color);
        }

        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
        }

        .form-label i {
            margin-right: 8px;
            width: 20px;
            text-align: center;
            color: var(--primary-color);
        }

        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #ced4da;
            transition: border-color 0.2s, box-shadow 0.2s;
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }

        .input-group-text {
            background-color: var(--light-color);
            border: 1px solid #ced4da;
            border-right: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--gradient-end), var(--gradient-start));
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
        }

        .btn-outline-secondary {
            border-color: var(--secondary-color);
            color: var(--secondary-color);
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s ease-in-out;
        }

        .btn-outline-secondary:hover {
            background-color: var(--secondary-color);
            color: #fff;
            box-shadow: 0 4px 10px rgba(44, 62, 80, 0.2);
            transform: translateY(-2px);
        }

        .form-footer {
            margin-top: 30px;
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #eee;
            color: #7f8c8d;
            font-size: 0.9rem;
        }

        /* Animation for form elements */
        .form-group {
            animation: fadeIn 0.5s ease forwards;
            opacity: 0;
            transform: translateY(10px);
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .card-container {
                padding: 30px 20px;
            }
            h1 {
                font-size: 1.6rem;
            }
            body {
                padding: 10px;
            }
        }

        @media (max-width: 400px) {
            .card-container {
                padding: 25px 15px;
            }
            h1 {
                font-size: 1.4rem;
            }
            .btn-primary, .btn-outline-secondary {
                padding: 10px;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="card-container">
        <h1>
            <i class="fas fa-book-medical"></i> Add New Book
        </h1>

        <form method="POST" action="{{ route('books.store') }}">
            @csrf

            <!-- Title -->
            <div class="mb-3 form-group">
                <label for="title" class="form-label">
                    <i class="fas fa-heading"></i> Title
                </label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-book"></i></span>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter book title" required>
                </div>
            </div>

            <!-- Author -->
            <div class="mb-3 form-group">
                <label for="author" class="form-label">
                    <i class="fas fa-user-edit"></i> Author
                </label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" name="author" id="author" class="form-control" placeholder="Enter author name" required>
                </div>
            </div>

            <!-- Published Year -->
            <div class="mb-4 form-group">
                <label for="publishedYear" class="form-label">
                    <i class="fas fa-calendar-alt"></i> Published Year
                </label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    <input type="number" name="publishedYear" id="publishedYear" class="form-control" placeholder="Enter year" min="1000" max="2025" required>
                </div>
                <div class="form-text">Enter a year between 1000 and 2025</div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100 form-group">
                <i class="fas fa-save"></i> Save Book
            </button>
        </form>

        <!-- Back Button -->
        <div class="text-center mt-4">
            <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Back to Books
            </a>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>