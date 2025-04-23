<!-- admin_homepage/show_books.blade.php -->
@extends('admin_homepage.admin_layout')

@section('content')
    <h1>All Books</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Book Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td ><img src="{{ asset('storage/' . $book->photo) }}" alt="Book Image"></td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->category }}</td>
                    <td>{{ $book->price }}</td>
                    <td>
                        <span class="status-box {{ strtolower($book->status) === 'available' ? 'available' : 'not-available' }}">
                            {{ $book->status }}
                        </span>
                    </td>
                    
                    
                   
                    <td>
                        <form action="{{ route('deleteBook', $book->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        
    </table>
@endsection
