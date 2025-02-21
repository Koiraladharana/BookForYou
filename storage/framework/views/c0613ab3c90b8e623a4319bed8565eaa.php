

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Edit Book</h2>

    <!-- Success Message -->
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <!-- Error Messages -->
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Update Book Form -->
    <form action="<?php echo e(route('books.update', $book->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="name" class="form-label">Book Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $book->name)); ?>" required>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" class="form-control" value="<?php echo e(old('author', $book->author)); ?>">
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" class="form-control" value="<?php echo e(old('location', $book->location)); ?>" required>
        </div>

        <!-- Category Selection -->
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" id="category" class="form-control" required onchange="handleCategoryChange()">
                <option value="donation" <?php echo e(old('category', $book->category) == 'donation' ? 'selected' : ''); ?>>Donation</option>
                <option value="selling" <?php echo e(old('category', $book->category) == 'selling' ? 'selected' : ''); ?>>Selling</option>
                <option value="exchange" <?php echo e(old('category', $book->category) == 'exchange' ? 'selected' : ''); ?>>Exchange</option>
            </select>
        </div>

        <!-- Price Field (Only for Selling) -->
        <div class="mb-3">
            <label for="price" class="form-label">Price (Only for Selling)</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" 
                   value="<?php echo e(old('price', ($book->category == 'donation' || $book->category == 'exchange') ? 0 : $book->price)); ?>" 
                   <?php echo e(($book->category == 'donation' || $book->category == 'exchange') ? 'readonly' : ''); ?>>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Contact Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo e(old('email', $book->email)); ?>" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number (Optional)</label>
            <input type="text" name="phone" class="form-control" value="<?php echo e(old('phone', $book->phone)); ?>">
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
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/user_homepage/edit_form.blade.php ENDPATH**/ ?>