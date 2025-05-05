@extends('admin_homepage.admin_layout')

@section('content')
    <div class="container-fluid p-0">
        <h1 class="mb-4">All Books</h1>

        <div class="mb-3">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <label for="filter" class="form-label fw-bold">Filter By:</label>
                    <form action="{{ route('showBooks') }}" method="GET">
                        <select class="form-select shadow-sm" id="filter" name="filter" onchange="this.form.submit()">
                            <option value="all" {{ request('filter') === 'all' || request('filter') === null ? 'selected' : '' }}>All Books</option>
                            <option value="donation" {{ request('filter') === 'donation' ? 'selected' : '' }}>Donation Books</option>
                            <option value="selling" {{ request('filter') === 'selling' ? 'selected' : '' }}>Selling Books</option>
                            <option value="exchange" {{ request('filter') === 'exchange' ? 'selected' : '' }}>Exchange Books</option>
                        </select>
                    </form>
                </div>
                <div class="col-md-auto ms-auto">
                    @if (isset($bookCounts))
                        <div class="d-flex gap-3">
                            <span class="badge bg-primary rounded-pill">Total: {{ $bookCounts['all'] }}</span>
                            @if (request('filter') === 'donation')
                                <span class="badge bg-success rounded-pill">Donation: {{ $bookCounts['donation'] }}</span>
                            @elseif (request('filter') === 'selling')
                                <span class="badge bg-info text-dark rounded-pill">Selling: {{ $bookCounts['selling'] }}</span>
                            @elseif (request('filter') === 'exchange')
                                <span class="badge bg-warning text-dark rounded-pill">Exchange: {{ $bookCounts['exchange'] }}</span>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th>Image</th>
                                <th>Book Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($books as $book)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . $book->photo) }}" alt="Book Image" class="img-thumbnail rounded" style="max-width: 60px; height: auto;">
                                    </td>
                                    <td>{{ $book->name }}</td>
                                    <td>
                                        <span class="badge bg-secondary">{{ ucfirst($book->category) }}</span>
                                    </td>
                                    <td>
                                        @if ($book->price > 0)
                                            ${{ number_format($book->price, 2) }}
                                        @else
                                            <span class="text-muted">Free</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge {{ strtolower($book->status) === 'available' ? 'bg-success' : 'bg-danger' }}">
                                            {{ $book->status }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('deleteBook', $book->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('Are you sure you want to delete this book?')">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="text-center py-3">No books found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-4">
            {{ $books->links() }}
        </div>
    </div>
@endsection

<style>
    .status-box.available {
        background-color: #28a745; /* Bootstrap success color */
        color: white;
        padding: 0.3em 0.6em;
        border-radius: 0.25em;
        font-size: 0.875rem;
        font-weight: bold;
    }

    .status-box.not-available {
        background-color: #dc3545; /* Bootstrap danger color */
        color: white;
        padding: 0.3em 0.6em;
        border-radius: 0.25em;
        font-size: 0.875rem;
        font-weight: bold;
    }
</style>