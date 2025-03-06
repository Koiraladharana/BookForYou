

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2>My Books</h2>
    
    <?php if($books->isEmpty()): ?>
        <p>No books added yet.</p>
    <?php else: ?>
        <div class="row">
            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <a href="<?php echo e(route('books.show', $book->id)); ?>">
                            <img src="<?php echo e(asset('storage/' . $book->photo)); ?>" class="card-img-top" alt="Book Photo" style="height: 200px; object-fit: cover;">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($book->name); ?></h5>
                            <p><strong>Status:</strong> 
                                <span class="badge <?php echo e($book->status == 'Available' ? 'bg-success' : 'bg-danger'); ?> p-2 rounded">
                                    <?php echo e($book->status); ?>

                                </span>
                            </p>
                            
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/user_homepage/view_books.blade.php ENDPATH**/ ?>