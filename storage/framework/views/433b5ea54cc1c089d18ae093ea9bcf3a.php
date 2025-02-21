

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="card">
        
        <div class="row g-0">
            <div class="col-md-4">
        
                <img src="<?php echo e(asset('storage/' . $book->photo)); ?>" width="150px" alt="Book Image">
                
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3><?php echo e($book->book_name); ?></h3>
                
                    <p>Book Name: <?php echo e($book->name); ?></p>
                    <?php if($book->author): ?>
                    <p>Author Name: <?php echo e($book->author); ?></p>
                    <?php endif; ?>
                    <p>Location: <?php echo e($book->location); ?></p>
                    <p>Price: <?php echo e($book->price); ?></p>
                    <p>Email: <?php echo e($book->email); ?></p>
                    <?php if($book->phone): ?>
                        <p>Phone: <?php echo e($book->phone); ?></p>
                    <?php endif; ?>
                    <a href="<?php echo e(route('books.view', $book->id)); ?>" class="btn btn-primary">Back to My Books</a>
                </div>
            </div>
        </div>
        
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/user_homepage/show_books.blade.php ENDPATH**/ ?>