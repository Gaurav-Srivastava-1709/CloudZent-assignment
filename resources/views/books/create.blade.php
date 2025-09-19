<div style="min-height: 100vh; background-color: #f5f5dc; display: flex; align-items: center; justify-content: center; padding: 20px;">
    <div style="background: #fff; padding: 30px; border-radius: 12px; max-width: 500px; width: 100%; box-shadow: 0 6px 15px rgba(0,0,0,0.15);">

        <h1 class="text-center mb-4">➕ Add Book</h1>

        <form method="POST" action="{{ route('books.store') }}">
            @csrf

            <!-- Title -->
            <div class="mb-3">
                <label class="form-label fw-bold">📖 Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter book title" required>
            </div>

            <!-- Author -->
            <div class="mb-3">
                <label class="form-label fw-bold">✍️ Author</label>
                <input type="text" name="author" class="form-control" placeholder="Enter author name" required>
            </div>

            <!-- Published Year -->
            <div class="mb-3">
                <label class="form-label fw-bold">📅 Published Year</label>
                <input type="number" name="publishedYear" class="form-control" placeholder="Enter year" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">💾 Save</button>
        </form>

        <!-- Back Button -->
        <div class="text-center mt-3">
            <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">⬅ Back</a>
        </div>
    </div>
</div>
