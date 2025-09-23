@extends('layout')

@section('content')
    <!-- Header with Search + Add Button -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <form class="d-flex flex-grow-1" method="GET" action="{{ route('books.index') }}" style="max-width: 500px;">
            <input type="text" class="form-control me-2 search-input" 
                   name="search" placeholder="🔍 Search by title or author" 
                   value="{{ request('search') }}">
            <button type="submit" class="btn search-btn">Search</button>
        </form>

        @if(auth()->check() && auth()->user()->is_admin)
            <a href="{{ route('books.create') }}" class="btn add-btn">➕ Add Book</a>
        @endif
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success text-center fw-bold success-alert mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Books Table -->
    <div class="card book-card shadow-lg border-0">
        <div class="card-header book-header text-white fw-bold d-flex align-items-center">
            <i class="fas fa-book-open me-2"></i> 📚 Books List
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-header">
                        <tr>
                            <th scope="col">📖 Book Name</th>
                            <th scope="col">✍️ Author Name</th>
                            <th scope="col">📅 Published Year</th>
                            @if(auth()->check() && auth()->user()->is_admin)
                                <th scope="col" class="text-center">⚙️ Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $book)
                            <tr class="book-row">
                                <td data-label="Book Name">{{ $book->title }}</td>
                                <td data-label="Author Name">{{ $book->author }}</td>
                                <td data-label="Published Year">{{ $book->publishedYear }}</td>

                                @if(auth()->check() && auth()->user()->is_admin)
                                    <td data-label="Action" class="text-center action-cell">
                                        <a href="{{ route('books.edit', $book->id) }}" 
                                           class="btn btn-sm edit-btn me-1">✏️ Edit</a>
                                        <form action="{{ route('books.destroy', $book->id) }}" 
                                              method="POST" style="display:inline;" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm delete-btn" 
                                                    onclick="return confirm('Are you sure you want to delete this book?')">
                                                🗑 Delete
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ auth()->check() && auth()->user()->is_admin ? 4 : 3 }}" 
                                    class="text-center text-muted py-4">
                                    <i class="fas fa-book fa-3x mb-3 text-muted"></i>
                                    <p>No books found.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-lg shadow-sm rounded-pill">
                {{ $books->withQueryString()->links('pagination::bootstrap-5') }}
            </ul>
        </nav>
    </div>

    <style>
        :root {
            --primary-color: #2c3e50;
            --accent-color: #d4a017;
            --secondary-color: #e74c3c;
            --light-color: #f8f9fa;
            --gradient-primary: linear-gradient(135deg, #2c3e50 0%, #4a6491 100%);
            --gradient-accent: linear-gradient(135deg, #d4a017 0%, #f7c948 100%);
            --gradient-card: linear-gradient(135deg, #ffffff 0%, #f0f4f8 100%);
            --box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            --border-radius: 12px;
            --transition: all 0.3s ease;
        }

        .search-input {
            border: 1px solid rgba(44, 62, 80, 0.2);
            border-radius: var(--border-radius) !important;
            padding: 10px 15px;
            transition: var(--transition);
            background: var(--light-color);
        }

        .search-input:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(212, 160, 23, 0.25);
        }

        .search-btn, .add-btn {
            background: var(--gradient-accent);
            color: var(--primary-color);
            border: none;
            padding: 10px 20px;
            border-radius: var(--border-radius);
            font-weight: 600;
            transition: var(--transition);
        }

        .search-btn:hover, .add-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(212, 160, 23, 0.3);
            color: var(--primary-color);
        }

        .success-alert {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            border: 1px solid #c3e6cb;
            color: #155724;
            border-radius: var(--border-radius);
        }

        .book-card {
            background: var(--gradient-card);
            border-radius: var(--border-radius);
            overflow: hidden;
        }

        .book-header {
            background: var(--gradient-primary);
            padding: 15px 20px;
            font-size: 1.25rem;
        }

        .table-header {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
        }

        .table-header th {
            border: none;
            color: var(--primary-color);
            font-weight: 600;
            padding: 15px;
        }

        .book-row {
            transition: var(--transition);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .book-row:hover {
            background: rgba(212, 160, 23, 0.05);
            transform: translateX(5px);
        }

        .book-row td {
            padding: 15px;
            vertical-align: middle;
            font-size: 1rem;
        }

        .edit-btn {
            background: transparent;
            color: var(--accent-color);
            border: 1px solid var(--accent-color);
            transition: var(--transition);
        }

        .edit-btn:hover {
            background: var(--accent-color);
            color: white;
            transform: translateY(-1px);
        }

        .delete-btn {
            background: var(--gradient-primary);
            color: white;
            border: none;
            transition: var(--transition);
        }

        .delete-btn:hover {
            background: linear-gradient(135deg, #1a252f 0%, #2c3e50 100%);
            transform: translateY(-1px);
        }

        .action-cell {
            white-space: nowrap;
        }

        /* Pagination */
        .pagination .page-item.active .page-link {
            background: var(--gradient-accent);
            border-color: var(--accent-color);
            color: var(--primary-color);
            font-weight: 600;
            box-shadow: 0 0.25rem 0.5rem rgba(212, 160, 23, 0.3);
        }

        .pagination .page-link {
            border-radius: 50px;
            margin: 0 3px;
            padding: 10px 15px;
            border: 1px solid rgba(44, 62, 80, 0.1);
            color: var(--primary-color);
            transition: var(--transition);
        }

        .pagination .page-link:hover {
            background: var(--gradient-primary);
            color: white;
            border-color: var(--primary-color);
            transform: translateY(-2px);
        }

        /* Responsive table */
        @media (max-width: 768px) {
            .d-flex.justify-content-between {
                flex-direction: column;
                align-items: stretch;
            }

            .search-form {
                max-width: none;
            }

            table thead {
                display: none;
            }

            table tbody tr {
                display: block;
                margin-bottom: 1.5rem;
                border: 1px solid rgba(0, 0, 0, 0.1);
                border-radius: var(--border-radius);
                padding: 15px;
                background: white;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            }

            table tbody td {
                display: block;
                text-align: right;
                position: relative;
                padding: 10px 0;
                border: none;
            }

            table tbody td::before {
                content: attr(data-label) ": ";
                font-weight: bold;
                color: var(--primary-color);
                position: absolute;
                left: 0;
                width: 100px;
                text-align: left;
            }

            .action-cell {
                text-align: left !important;
            }

            .action-cell::before {
                content: "Actions: ";
            }

            .delete-form {
                display: inline-block;
                margin-top: 5px;
            }

            .pagination {
                flex-wrap: wrap;
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .book-header {
                font-size: 1.1rem;
                padding: 12px 15px;
            }

            .book-row td {
                padding: 10px 5px;
                font-size: 0.95rem;
            }

            .search-input, .search-btn, .add-btn {
                font-size: 0.9rem;
                padding: 8px 12px;
            }
        }
    </style>
@endsection