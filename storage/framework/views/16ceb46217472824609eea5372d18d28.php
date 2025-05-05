

<?php $__env->startSection('content'); ?>
    <div class="container-fluid p-0">
        <h1 class="mb-4">All Books</h1>

        <div class="mb-3">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <label for="filter" class="form-label fw-bold">Filter By:</label>
                    <form action="<?php echo e(route('showBooks')); ?>" method="GET">
                        <select class="form-select shadow-sm" id="filter" name="filter" onchange="this.form.submit()">
                            <option value="all" <?php echo e(request('filter') === 'all' || request('filter') === null ? 'selected' : ''); ?>>All Books</option>
                            <option value="donation" <?php echo e(request('filter') === 'donation' ? 'selected' : ''); ?>>Donation Books</option>
                            <option value="selling" <?php echo e(request('filter') === 'selling' ? 'selected' : ''); ?>>Selling Books</option>
                            <option value="exchange" <?php echo e(request('filter') === 'exchange' ? 'selected' : ''); ?>>Exchange Books</option>
                        </select>
                    </form>
                </div>
                <div class="col-md-auto ms-auto">
                    <?php if(isset($bookCounts)): ?>
                        <div class="d-flex gap-3">
                            <span class="badge bg-primary rounded-pill">Total: <?php echo e($bookCounts['all']); ?></span>
                            <?php if(request('filter') === 'donation'): ?>
                                <span class="badge bg-success rounded-pill">Donation: <?php echo e($bookCounts['donation']); ?></span>
                            <?php elseif(request('filter') === 'selling'): ?>
                                <span class="badge bg-info text-dark rounded-pill">Selling: <?php echo e($bookCounts['selling']); ?></span>
                            <?php elseif(request('filter') === 'exchange'): ?>
                                <span class="badge bg-warning text-dark rounded-pill">Exchange: <?php echo e($bookCounts['exchange']); ?></span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
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
                            <?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo e(asset('storage/' . $book->photo)); ?>" alt="Book Image" class="img-thumbnail rounded" style="max-width: 60px; height: auto;">
                                    </td>
                                    <td><?php echo e($book->name); ?></td>
                                    <td>
                                        <span class="badge bg-secondary"><?php echo e(ucfirst($book->category)); ?></span>
                                    </td>
                                    <td>
                                        <?php if($book->price > 0): ?>
                                            $<?php echo e(number_format($book->price, 2)); ?>

                                        <?php else: ?>
                                            <span class="text-muted">Free</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span class="badge <?php echo e(strtolower($book->status) === 'available' ? 'bg-success' : 'bg-danger'); ?>">
                                            <?php echo e($book->status); ?>

                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <form action="<?php echo e(route('deleteBook', $book->id)); ?>" method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('Are you sure you want to delete this book?')">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr><td colspan="6" class="text-center py-3">No books found.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <?php echo e($books->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

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
<?php echo $__env->make('admin_homepage.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/admin_homepage/show_book.blade.php ENDPATH**/ ?>