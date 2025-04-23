<!-- admin_homepage/show_books.blade.php -->


<?php $__env->startSection('content'); ?>
    <h1>All Books</h1>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
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
            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td ><img src="<?php echo e(asset('storage/' . $book->photo)); ?>" alt="Book Image"></td>
                    <td><?php echo e($book->name); ?></td>
                    <td><?php echo e($book->category); ?></td>
                    <td><?php echo e($book->price); ?></td>
                    <td>
                        <span class="status-box <?php echo e(strtolower($book->status) === 'available' ? 'available' : 'not-available'); ?>">
                            <?php echo e($book->status); ?>

                        </span>
                    </td>
                    
                    
                   
                    <td>
                        <form action="<?php echo e(route('deleteBook', $book->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_homepage.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/admin_homepage/show_book.blade.php ENDPATH**/ ?>