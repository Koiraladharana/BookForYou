

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="card">
        
        <div class="row g-0">
            <div class="col-md-4 text-center">
                <!-- Ensure Image Fits Properly -->
                <img src="<?php echo e(asset('storage/' . $book->photo)); ?>" class="img-fluid rounded" style="max-width: 100%; height: auto;" alt="Book Image">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    
                    <p><strong>User ID:</strong> <?php echo e($book->user_id); ?></p>
                    <p><strong>Book name:</strong> <?php echo e($book->name); ?></p>
                    
                    <?php if(strtolower($book->category) === 'exchange'): ?>
                        <p><strong>Book I Want:</strong> <?php echo e($book->want_book ?? 'Not specified'); ?></p>
                    <?php endif; ?>
                    
                    <p><strong>Author:</strong> <?php echo e($book->author ?? 'Unknown'); ?></p>
                    <p><strong>Category:</strong> <?php echo e($book->category); ?></p>
                    <p><strong>ISBN:</strong> <?php echo e($book->isbn); ?></p>
                    <p><strong>Publication:</strong> <?php echo e($book->publication); ?></p>
                    <p><strong>Location:</strong> <?php echo e($book->location); ?></p>
                    <p><strong>Price:</strong> RS.<?php echo e($book->price); ?></p>

                    <!-- Status with Color -->
                    <p><strong>Status:</strong> 
                        <span class="badge <?php echo e($book->status == 'Available' ? 'bg-success' : 'bg-danger'); ?> p-2 rounded">
                            <?php echo e($book->status); ?>

                        </span>
                    </p>
                    

                    <p><strong>Email:</strong> <?php echo e($book->email); ?></p>
                    
                    <?php if($book->phone): ?>
                        <p><strong>Phone:</strong> <?php echo e($book->phone); ?></p>
                    <?php endif; ?>

                    <a href="<?php echo e(route('userdas', $book->id)); ?>" class="btn btn-primary">Back to My Books</a>
                </div>
            </div>
        </div>
        
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/user_homepage/user_showbook.blade.php ENDPATH**/ ?>