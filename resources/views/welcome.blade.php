<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | 📚 📚 Book CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --accent-color: #d4a017;
            --secondary-color: #8B4513;
            --light-color: #f5f5f5;
            --dark-color: #1a252f;
            --text-color: #2c2c2c;
            --text-light: #5c6b73;
            --border-radius: 12px;
            --box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            --transition: all 0.4s ease;
            --gradient-primary: linear-gradient(135deg, #2c3e50 0%, #4a6491 100%);
            --gradient-accent: linear-gradient(135deg, #d4a017 0%, #f7c948 100%);
            --gradient-hero: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            --gradient-card: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            --gradient-footer: linear-gradient(135deg, #1a252f 0%, #2c3e50 100%);
            --gradient-featured: linear-gradient(135deg, #ff6b6b 0%, #ffa36c 100%);
            --gradient-features: linear-gradient(135deg, #1d976c 0%, #93f9b9 100%);
            --gradient-book1: linear-gradient(135deg, #8A2BE2 0%, #4B0082 100%);
            --gradient-book2: linear-gradient(135deg, #FF4500 0%, #FF8C00 100%);
            --gradient-book3: linear-gradient(135deg, #1E90FF 0%, #00BFFF 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-color);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
            padding: 0 15px;
        }

        header {
            background: var(--gradient-primary);
            box-shadow: var(--box-shadow);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            padding: 0 15px;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: var(--transition);
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .logo i {
            font-size: 32px;
        }

        .nav-links {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .nav-link {
            padding: 12px 24px;
            background: rgba(255, 255, 255, 0.15);
            color: white;
            font-weight: 500;
            text-decoration: none;
            border-radius: var(--border-radius);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: var(--transition);
            text-align: center;
            min-width: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            backdrop-filter: blur(10px);
        }

        .nav-link:hover {
            background: var(--gradient-accent);
            color: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .hero {
            text-align: center;
            padding: 100px 20px;
            background: var(--gradient-hero);
            background-size: cover;
            background-position: center;
            color: white;
            border-radius: var(--border-radius);
            margin: 30px 0;
            position: relative;
            overflow: hidden;
            box-shadow: var(--box-shadow);
        }

        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.3;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
            font-weight: 800;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            background: linear-gradient(135deg, #ffffff 0%, #e0e0e0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p {
            font-size: 22px;
            margin: 0 auto 30px;
            max-width: 600px;
            opacity: 0.9;
            font-weight: 300;
        }

        .hero .btn {
            display: inline-block;
            padding: 16px 40px;
            background: var(--gradient-accent);
            color: var(--primary-color);
            text-decoration: none;
            border-radius: var(--border-radius);
            font-weight: 700;
            transition: var(--transition);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
            border: none;
            font-size: 18px;
            position: relative;
            overflow: hidden;
        }

        .hero .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: 0.5s;
        }

        .hero .btn:hover::before {
            left: 100%;
        }

        .hero .btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.35);
        }

        .featured-books {
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            color: var(--primary-color);
            font-size: 42px;
            margin-bottom: 50px;
            font-weight: 800;
            position: relative;
        }

        .section-title::after {
            content: "";
            display: block;
            width: 100px;
            height: 5px;
            background: var(--gradient-accent);
            margin: 20px auto;
            border-radius: 3px;
        }

        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .book-card {
            background: var(--gradient-card);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            transition: var(--transition);
            border: 1px solid rgba(0, 0, 0, 0.05);
            position: relative;
        }

        .book-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .book-card-image {
            width: 100%;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 60px;
            position: relative;
            overflow: hidden;
        }

        .book-card:nth-child(1) .book-card-image {
            background: var(--gradient-book1);
        }

        .book-card:nth-child(2) .book-card-image {
            background: var(--gradient-book2);
        }

        .book-card:nth-child(3) .book-card-image {
            background: var(--gradient-book3);
        }

        .book-card-content {
            padding: 25px;
        }

        .book-card h3 {
            font-size: 22px;
            color: var(--primary-color);
            margin-bottom: 12px;
            font-weight: 700;
        }

        .book-card p {
            font-size: 16px;
            color: var(--text-light);
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .book-card .btn {
            display: inline-block;
            padding: 12px 24px;
            background: var(--gradient-primary);
            color: white;
            text-decoration: none;
            border-radius: var(--border-radius);
            font-size: 15px;
            font-weight: 600;
            transition: var(--transition);
            border: none;
            cursor: pointer;
        }

        .book-card .btn:hover {
            background: var(--gradient-accent);
            color: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .features {
            padding: 80px 0;
            background: var(--gradient-features);
            position: relative;
            overflow: hidden;
        }

        .features::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.3;
        }

        .features .section-title {
            color: white;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            position: relative;
            z-index: 1;
        }

        .feature-item {
            text-align: center;
            padding: 40px 25px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            transition: var(--transition);
            backdrop-filter: blur(10px);
        }

        .feature-item:hover {
            transform: translateY(-8px);
            background: white;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .feature-icon {
            font-size: 50px;
            margin-bottom: 25px;
            background: var(--gradient-features);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .feature-item h3 {
            font-size: 22px;
            margin-bottom: 15px;
            color: var(--primary-color);
            font-weight: 700;
        }

        .feature-item p {
            color: var(--text-light);
            font-size: 16px;
        }

        .stats {
            padding: 80px 0;
            background: var(--gradient-featured);
            color: white;
            text-align: center;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
        }

        .stat-item {
            padding: 30px 20px;
        }

        .stat-number {
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 10px;
            display: block;
        }

        .stat-label {
            font-size: 18px;
            opacity: 0.9;
        }

        footer {
            background: var(--gradient-footer);
            color: white;
            text-align: center;
            padding: 60px 0 30px;
            margin-top: auto;
        }

        .footer-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 25px;
            margin-bottom: 40px;
        }

        .footer-logo {
            font-size: 32px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .social-links {
            display: flex;
            gap: 20px;
        }

        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: white;
            text-decoration: none;
            transition: var(--transition);
            font-size: 20px;
        }

        .social-link:hover {
            background: var(--gradient-accent);
            color: var(--primary-color);
            transform: translateY(-5px) scale(1.1);
        }

        .footer-links {
            display: flex;
            gap: 25px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: var(--transition);
            font-size: 16px;
        }

        .footer-links a:hover {
            color: var(--accent-color);
            transform: translateY(-2px);
        }

        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 25px;
            font-size: 15px;
            color: rgba(255, 255, 255, 0.7);
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .hero h1 {
                font-size: 40px;
            }
            
            .hero p {
                font-size: 20px;
            }
            
            .section-title {
                font-size: 36px;
            }
        }

        @media (max-width: 768px) {
            .hero {
                padding: 80px 15px;
            }

            .hero h1 {
                font-size: 36px;
            }

            .hero p {
                font-size: 18px;
            }

            .nav-links {
                justify-content: center;
                gap: 10px;
                margin-top: 15px;
                width: 100%;
            }

            .nav-link {
                padding: 10px 18px;
                font-size: 15px;
                flex: 1;
                max-width: 140px;
            }

            .book-grid {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 25px;
            }
            
            .section-title {
                font-size: 32px;
            }
            
            .stat-number {
                font-size: 40px;
            }
        }

        @media (max-width: 576px) {
            .logo {
                font-size: 24px;
            }

            .hero h1 {
                font-size: 32px;
            }

            .hero p {
                font-size: 17px;
            }

            .nav-link {
                padding: 10px 15px;
                min-width: 110px;
                font-size: 14px;
            }

            .section-title {
                font-size: 28px;
            }

            .book-grid {
                grid-template-columns: 1fr;
            }
            
            .footer-links {
                flex-direction: column;
                gap: 15px;
            }
            
            .footer-logo {
                font-size: 28px;
            }
            
            .social-links {
                gap: 15px;
            }
            
            .social-link {
                width: 45px;
                height: 45px;
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <a href="/" class="logo">
                    <i class="fas "></i> 📚 Book CRUD
                </a>
                <div class="nav-links">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="nav-link">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                            <a href="{{ route('books.index') }}" class="nav-link">
                                <i class="fas fa-book"></i> See Books
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="nav-link">
                                <i class="fas fa-sign-in-alt"></i> Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-link">
                                    <i class="fas fa-user-plus"></i> Register
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1>Welcome to 📚 Book CRUD</h1>
                    <p>Discover a world of stories, knowledge, and adventure. Explore our collection and start reading today!</p>
                    <a href="{{ route('books.index') }}" class="btn">
                        <i class="fas fa-book-reader"></i> Browse Books
                    </a>
                </div>
            </div>
        </section>

        <section class="featured-books">
            <div class="container">
                <h2 class="section-title">Featured Books</h2>
                <div class="book-grid">
                    <div class="book-card">
                        <div class="book-card-image">
                            <i class="fas fa-mountain"></i>
                        </div>
                        <div class="book-card-content">
                            <h3>The Great Adventure</h3>
                            <p>Embark on a thrilling journey through uncharted lands and discover hidden treasures in this epic tale of courage and discovery.</p>
                            <a href="#" class="btn">Read More</a>
                        </div>
                    </div>
                    <div class="book-card">
                        <div class="book-card-image">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="book-card-content">
                            <h3>Mysteries Unveiled</h3>
                            <p>Unravel secrets in this gripping mystery novel that will keep you guessing until the very last page.</p>
                            <a href="#" class="btn">Read More</a>
                        </div>
                    </div>
                    <div class="book-card">
                        <div class="book-card-image">
                            <i class="fas fa-brain"></i>
                        </div>
                        <div class="book-card-content">
                            <h3>Knowledge Quest</h3>
                            <p>Expand your mind with this insightful non-fiction work that explores the frontiers of human understanding.</p>
                            <a href="#" class="btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="stats">
            <div class="container">
                <div class="stats-grid">
                    <div class="stat-item">
                        <span class="stat-number">10,000+</span>
                        <span class="stat-label">Books Available</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">5,000+</span>
                        <span class="stat-label">Happy Readers</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">50+</span>
                        <span class="stat-label">Categories</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">24/7</span>
                        <span class="stat-label">Access</span>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="features">
            <div class="container">
                <h2 class="section-title">Why Choose 📚 Book CRUD?</h2>
                <div class="features-grid">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h3>Vast Collection</h3>
                        <p>Access thousands of books across all genres, from classic literature to modern bestsellers.</p>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <h3>Community Driven</h3>
                        <p>Join a vibrant community of readers, share reviews, and discover new favorites together.</p>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h3>Easy to Use</h3>
                        <p>Our intuitive platform makes finding, organizing, and reading books a seamless experience.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <i class="fas"></i> 📚 Book CRUD
                </div>
                <div class="social-links">
                    <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-goodreads"></i></a>
                </div>
                <div class="footer-links">
                    <a href="#">About Us</a>
                    <a href="#">Contact</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                    <a href="#">FAQ</a>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2025 📚 Book CRUD. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>