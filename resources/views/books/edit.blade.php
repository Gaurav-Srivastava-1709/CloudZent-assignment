<div style="min-height: 100vh; background-color: #f5f5dc; display: flex; align-items: center; justify-content: center; padding: 20px;">
    <div style="background: #fff; padding: 30px; border-radius: 12px; max-width: 500px; width: 100%; box-shadow: 0 6px 15px rgba(0,0,0,0.15);">

        <h1 class="text-center mb-4">✏️ Edit Book</h1>

        <!-- Update Form -->
        <form method="POST" action="{{ route('books.update', $book->id) }}">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-3">
                <label class="form-label fw-bold">📖 Title</label>
                <input type="text" name="title" value="{{ $book->title }}" class="form-control" required>
            </div>

            <!-- Author -->
            <div class="mb-3">
                <label class="form-label fw-bold">✍️ Author</label>
                <input type="text" name="author" value="{{ $book->author }}" class="form-control" required>
            </div>

            <!-- Published Year -->
            <div class="mb-3">
                <label class="form-label fw-bold">📅 Published Year</label>
                <input type="number" name="publishedYear" value="{{ $book->publishedYear }}" class="form-control" required>
            </div>

            <!-- Update Button -->
            <button type="submit" class="btn btn-primary w-100">✅ Update</button>
        </form>

        <!-- Back Button -->
        <div class="text-center mt-3">
            <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">⬅ Back</a>
        </div>
    </div>
</div>
