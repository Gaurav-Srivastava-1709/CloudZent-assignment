<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card-container {
            background: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            max-width: 500px;
            width: 100%;
            border: 1px solid #e0e0e0;
        }
        .form-label {
            font-weight: 600;
            color: #343a40;
            margin-bottom: 8px;
        }
        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #ced4da;
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 12px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.2);
        }
        .btn-outline-secondary {
            border-color: #6c757d;
            color: #6c757d;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s ease-in-out;
        }
        .btn-outline-secondary:hover {
            background-color: #6c757d;
            color: #fff;
            box-shadow: 0 4px 10px rgba(108, 117, 125, 0.2);
        }
        h1 {
            color: #343a40;
            margin-bottom: 30px;
            font-weight: 700;
            font-size: 2.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        h1 .icon {
            margin-right: 10px;
            font-size: 1.8rem;
        }
    </style>
</head>
<body>
    <div class="card-container">
        <h1 class="text-center mb-4">
            <span class="icon">✏️</span> Edit Book
        </h1>

        <!-- Update Form -->
        <form method="POST" action="{{ route('books.update', $book->id) }}">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-3">
                <label for="title" class="form-label">📖 Title</label>
                <input type="text" name="title" id="title" value="{{ $book->title }}" class="form-control" required>
            </div>

            <!-- Author -->
            <div class="mb-3">
                <label for="author" class="form-label">✍️ Author</label>
                <input type="text" name="author" id="author" value="{{ $book->author }}" class="form-control" required>
            </div>

            <!-- Published Year -->
            <div class="mb-4">
                <label for="publishedYear" class="form-label">📅 Published Year</label>
                <input type="number" name="publishedYear" id="publishedYear" value="{{ $book->publishedYear }}" class="form-control" required>
            </div>

            <!-- Update Button -->
            <button type="submit" class="btn btn-primary w-100">✅ Update</button>
        </form>

        <!-- Back Button -->
        <div class="text-center mt-4">
            <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">⬅ Back to Books</a>
        </div>
    </div>

    <!-- Bootstrap JS (optional, for certain components like dropdowns, tooltips etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>