@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add a New Book</h2>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="name" class="form-label">Book Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" class="form-control">
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" class="form-control" id="categorySelect" required>
                <option value="donation">Donation</option>
                <option value="selling">Selling</option>
                <option value="exchange">Exchange</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Book Photo</label>
            <input type="file" name="photo" class="form-control">
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" class="form-control" required>
        </div>

        <!-- Price Field (Only for Selling) -->
        <div class="mb-3">
            <label for="price" class="form-label">Price (Only for Selling)</label>
            <input type="number" step="0.01" name="price" id="priceInput" class="form-control" disabled>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Contact Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number (Optional)</label>
            <input type="text" name="phone" class="form-control">
        </div>

        <!-- Exchange Book Fields (Only for Exchange Category) -->
        <div class="mb-3" id="exchangeFields" style="display: none;">
            <label for="have_book" class="form-label">Book You Have</label>
            <input type="text" name="have_book" class="form-control">
            
            <label for="want_book" class="form-label">Book You Want</label>
            <input type="text" name="want_book" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
</div>

<script>
    document.getElementById("categorySelect").addEventListener("change", function() {
        let priceInput = document.getElementById("priceInput");
        let exchangeFields = document.getElementById("exchangeFields");

        if (this.value === "exchange") {
            exchangeFields.style.display = "block";
            priceInput.value = "";
            priceInput.setAttribute("disabled", "disabled");
        } else {
            exchangeFields.style.display = "none";
        }

        if (this.value === "selling") {
            priceInput.removeAttribute("disabled");
        } else {
            priceInput.value = "";
            priceInput.setAttribute("disabled", "disabled");
        }
    });
</script>
@endsection
