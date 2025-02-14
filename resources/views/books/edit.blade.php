<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Book</h1>
        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="published_date" class="form-label">Published Date</label>
                <input type="date" class="form-control" id="published_date" name="published_date"
                    value="{{ $book->published_date }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $book->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Book Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @if ($book->image)
                    <img src="{{ asset('storage/' . $book->image) }}" alt="Book Image" class="img-thumbnail mt-2"
                        width="100">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update Book</button>
        </form>
    </div>
</body>

</html>
