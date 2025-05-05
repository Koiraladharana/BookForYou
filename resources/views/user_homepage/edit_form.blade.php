@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Book</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Error Messages -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Update Book Form -->
    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Book Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $book->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" class="form-control" value="{{ old('author', $book->author) }}">
        </div>

        <!-- Book Image Upload -->
        <div class="mb-3">
            <label for="photo" class="form-label">Book Image</label>
            <input type="file" name="photo" class="form-control" accept="image/*" onchange="previewImage(event)">

            @if($book->photo)
                <div class="mt-2">
                    <p>Current Image:</p>
                    <img id="preview" src="{{ asset('storage/' . $book->photo) }}" alt="Book Image" width="150">
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" class="form-control" value="{{ old('location', $book->location) }}" required>
        </div>

        <!-- Category Selection -->
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" id="category" class="form-control" required onchange="handleCategoryChange()">
                <option value="donation" {{ old('category', $book->category) == 'donation' ? 'selected' : '' }}>Donation</option>
                <option value="selling" {{ old('category', $book->category) == 'selling' ? 'selected' : '' }}>Selling</option>
                <option value="exchange" {{ old('category', $book->category) == 'exchange' ? 'selected' : '' }}>Exchange</option>
            </select>
        </div>

        <!-- Price Field (Only for Selling) -->
        <div class="mb-3">
            <label for="price" class="form-label">Price (Only for Selling)</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" 
                   value="{{ old('price', ($book->category == 'donation' || $book->category == 'exchange') ? 0 : $book->price) }}" 
                   {{ ($book->category == 'donation' || $book->category == 'exchange') ? 'readonly' : '' }}>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Contact Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $book->email)}}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number (Optional)</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $book->phone) }}">
        </div>

        <button type="submit" class="btn btn-success">Update Book</button>
    </form>
</div>

<script>
    function handleCategoryChange() {
        let category = document.getElementById('category').value;
        let priceField = document.getElementById('price');

        if (category === 'donation' || category === 'exchange') {
            priceField.value = 0;
            priceField.setAttribute('readonly', 'readonly');
        } else {
            priceField.removeAttribute('readonly');
        }
    }

    function previewImage(event) {
        var preview = document.getElementById('preview');
        preview.src = URL.createObjectURL(event.target.files[0]);
        preview.style.display = 'block';
    }
</script>
@endsection
