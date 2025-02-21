

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Edit Books</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Book Name</th>
                <th>Category</th>
                <th>Location</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($book->name); ?></td>
                <td><?php echo e(ucfirst($book->category)); ?></td>
                <td><?php echo e($book->location); ?></td>
                <td><?php echo e($book->status); ?></td>
                <td>
                    <a href="<?php echo e(route('books.edit', $book->id)); ?>" class="btn btn-sm btn-primary">Edit</a>
                
                    <form action="<?php echo e(route('books.toggleStatus', $book->id)); ?>" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-info btn-sm">
                            <?php echo e($book->status == 'Available' ? 'Mark as Not Available' : 'Mark as Available'); ?>

                        </button>
                    </form>
                
                    <form action="<?php echo e(route('books.destroy', $book->id)); ?>" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
                
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/user_homepage/show_books_edit.blade.php ENDPATH**/ ?>