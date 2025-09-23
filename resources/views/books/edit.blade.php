<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book | Book CRUD</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            --secondary-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            --card-gradient: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            --button-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --success-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: var(--primary-gradient);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }
        
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            z-index: -1;
        }
        
        .card-container {
            background: var(--card-gradient);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .card-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .card-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--secondary-gradient);
        }
        
        h1 {
            background: var(--secondary-gradient);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 30px;
            font-weight: 700;
            font-size: 2.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        
        h1 .icon {
            margin-right: 10px;
            font-size: 1.8rem;
        }
        
        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
        }
        
        .form-label i {
            margin-right: 8px;
            width: 20px;
            text-align: center;
        }
        
        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 0 0.2rem rgba(106, 17, 203, 0.25);
        }
        
        .input-group {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            z-index: 5;
        }
        
        .btn-update {
            background: var(--button-gradient);
            border: none;
            border-radius: 50px;
            color: white;
            padding: 12px 30px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-update:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(102, 126, 234, 0.6);
        }
        
        .btn-update i {
            margin-right: 8px;
        }
        
        .btn-back {
            background: transparent;
            border: 2px solid #6a11cb;
            border-radius: 50px;
            color: #6a11cb;
            padding: 10px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }
        
        .btn-back:hover {
            background: #6a11cb;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(106, 17, 203, 0.3);
        }
        
        .btn-back i {
            margin-right: 8px;
        }
        
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
            100% { transform: translateY(0px); }
        }
        
        .book-icon {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        
        .book-icon-circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: var(--secondary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            box-shadow: 0 5px 15px rgba(250, 112, 154, 0.4);
        }
        
        @media (max-width: 576px) {
            .card-container {
                padding: 30px 20px;
            }
            
            h1 {
                font-size: 1.8rem;
            }
            
            .book-icon-circle {
                width: 70px;
                height: 70px;
                font-size: 1.8rem;
            }
        }
        
        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="card-container">
        <div class="book-icon">
            <div class="book-icon-circle floating">
                <i class="fas fa-book"></i>
            </div>
        </div>
        
        <h1>
            <i class="fas fa-edit"></i> Edit Book
        </h1>

        <!-- Update Form -->
        <form method="POST" action="{{ route('books.update', $book->id) }}" id="edit-book-form">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="form-group">
                <label for="title" class="form-label">
                    <i class="fas fa-heading"></i> Title
                </label>
                <div class="input-group">
                    <input type="text" name="title" id="title" value="{{ $book->title }}" class="form-control" required placeholder="Enter book title">
                    <span class="input-icon">
                        <i class="fas fa-book"></i>
                    </span>
                </div>
            </div>

            <!-- Author -->
            <div class="form-group">
                <label for="author" class="form-label">
                    <i class="fas fa-user-edit"></i> Author
                </label>
                <div class="input-group">
                    <input type="text" name="author" id="author" value="{{ $book->author }}" class="form-control" required placeholder="Enter author name">
                    <span class="input-icon">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
            </div>

            <!-- Published Year -->
            <div class="form-group">
                <label for="publishedYear" class="form-label">
                    <i class="fas fa-calendar-alt"></i> Published Year
                </label>
                <div class="input-group">
                    <input type="number" name="publishedYear" id="publishedYear" value="{{ $book->publishedYear }}" class="form-control" required placeholder="Enter publication year">
                    <span class="input-icon">
                        <i class="fas fa-calendar"></i>
                    </span>
                </div>
            </div>

            <!-- Update Button -->
            <button type="submit" class="btn btn-update mb-3">
                <i class="fas fa-save"></i> Update Book
            </button>
        </form>

        <!-- Back Button -->
        <div class="text-center">
            <a href="{{ route('books.index') }}" class="btn btn-back">
                <i class="fas fa-arrow-left"></i> Back to Books
            </a>
        </div>
    </div>

    <!-- Bootstrap JS (optional, for certain components like dropdowns, tooltips etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>