

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="card shadow-lg rounded-lg">
        <div class="row g-0">
            <div class="col-md-4 text-center bg-light p-4 rounded-start">
                <img src="<?php echo e(asset('storage/' . $book->photo)); ?>" class="img-fluid rounded shadow" style="max-width: 100%; height: auto;" alt="Book Image">
            </div>
            <div class="col-md-8">
                <div class="card-body p-4">
                    <h2 class="card-title mb-4 text-primary"><?php echo e($book->name); ?></h2>
                    <p class="card-text"><i class="fas fa-user text-secondary me-2"></i> <strong>User ID:</strong> <?php echo e($book->user_id); ?></p>
                    <p class="card-text"><i class="fas fa-book text-secondary me-2"></i> <strong>Book Name:</strong> <?php echo e($book->name); ?></p>

                    <?php if(strtolower($book->category) === 'exchange'): ?>
                        <p class="card-text"><i class="fas fa-exchange-alt text-warning me-2"></i> <strong>Book I Want:</strong> <?php echo e($book->want_book ?? 'Not specified'); ?></p>
                    <?php endif; ?>

                    <p class="card-text"><i class="fas fa-pen-nib text-info me-2"></i> <strong>Author:</strong> <?php echo e($book->author ?? 'Unknown'); ?></p>
                    <p class="card-text"><i class="fas fa-tag text-success me-2"></i> <strong>Category:</strong> <?php echo e($book->category); ?></p>
                    <p class="card-text"><i class="fas fa-barcode text-muted me-2"></i> <strong>ISBN:</strong> <?php echo e($book->isbn); ?></p>
                    <p class="card-text"><i class="fas fa-building text-secondary me-2"></i> <strong>Publication:</strong> <?php echo e($book->publication); ?></p>
                    <p class="card-text"><i class="fas fa-map-marker-alt text-danger me-2"></i> <strong>Location:</strong> <?php echo e($book->location); ?></p>
                    <p class="card-text"><i class="fas fa-money-bill-wave text-success me-2"></i> <strong>Price:</strong> RS.<?php echo e($book->price); ?></p>

                    <p class="card-text">
                        <i class="fas fa-check-circle <?php echo e($book->status == 'Available' ? 'text-success' : 'text-danger'); ?> me-2"></i>
                        <strong>Status:</strong>
                        <span class="badge <?php echo e($book->status == 'Available' ? 'bg-success' : 'bg-danger'); ?> p-2 rounded">
                            <?php echo e($book->status); ?>

                        </span>
                    </p>

                    <p class="card-text"><i class="fas fa-envelope text-primary me-2"></i> <strong>Email:</strong> <?php echo e($book->email); ?></p>

                    <?php if($book->phone): ?>
                        <p class="card-text"><i class="fas fa-phone text-success me-2"></i> <strong>Phone:</strong> <?php echo e($book->phone); ?></p>
                    <?php endif; ?>

                    <a href="<?php echo e(route('userdas', $book->id)); ?>" class="btn btn-outline-primary rounded-pill"><i class="fas fa-arrow-left me-2"></i> Back to My Books</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border: 1px solid #ddd;
    }

    .card-title {
        font-size: 2.2em;
        font-weight: bold;
    }

    .card-text {
        font-size: 1.1em;
        margin-bottom: 0.75rem;
    }

    .rounded-start {
        border-top-left-radius: 0.5rem !important;
        border-bottom-left-radius: 0.5rem !important;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: white;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/user_homepage/show_books.blade.php ENDPATH**/ ?>