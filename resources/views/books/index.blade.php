@extends('layout')

@section('content')
    <!-- Header with Search + Add Button -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <form class="d-flex" method="GET" action="{{ route('books.index') }}">
            <input type="text" class="form-control me-2 border-primary" 
                   name="search" placeholder="🔍 Search by title or author" 
                   value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        @if(auth()->check() && auth()->user()->is_admin)
            <a href="{{ route('books.create') }}" class="btn btn-primary">➕ Add Book</a>
        @endif
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-primary text-center fw-bold">
            {{ session('success') }}
        </div>
    @endif

    <!-- Books Table -->
    <div class="card shadow border-primary">
        <div class="card-header bg-primary text-white fw-bold">
            📚 Books List
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>📖 Book Name</th>
                        <th>✍️ Author Name</th>
                        <th>📅 Published Year</th>
                        @if(auth()->check() && auth()->user()->is_admin)
                            <th class="text-center">⚙️ Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->publishedYear }}</td>

                            @if(auth()->check() && auth()->user()->is_admin)
                                <td class="text-center">
                                    <a href="{{ route('books.edit', $book->id) }}" 
                                       class="btn btn-sm btn-outline-primary me-1">✏️ Edit</a>
                                    <form action="{{ route('books.destroy', $book->id) }}" 
                                          method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger" 
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
                                class="text-center text-muted">
                                No books found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-3 d-flex justify-content-center">
        {{ $books->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
@endsection
