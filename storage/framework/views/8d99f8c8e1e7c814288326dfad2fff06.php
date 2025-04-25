
<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 class="mb-4" style="color: #343a40;"><i class="fas fa-users me-2"></i> All Users</h1>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th><i class="fas fa-user me-2"></i> Name</th>
                                <th><i class="fas fa-envelope me-2"></i> Email</th>
                                <th><i class="fas fa-tag me-2"></i> Role</th>
                                <th class="text-center"><i class="fas fa-cogs me-2"></i> Action</th>
                                <th class="text-center"><i class="fas fa-book-open me-2"></i> Total Books</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td>
                                        <?php if($user->role === 'admin'): ?>
                                            <span class="badge bg-primary"><?php echo e(ucfirst($user->role)); ?></span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary"><?php echo e(ucfirst($user->role)); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <form action="<?php echo e(route('deleteUser', $user->id)); ?>" method="POST" style="display: inline;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')"><i class="fas fa-trash-alt me-1"></i> Delete</button>
                                        </form>
                                    </td>
                                    <td class="text-center"><?php echo e($user->books_count); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<style>
    .container {
        padding: 30px;
    }

    .card {
        border: none;
        border-radius: 8px;
    }

    .thead-light th {
        background-color: #f8f9fa;
        color: #555;
        border-bottom: 2px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tbody tr:hover {
        background-color: #e9ecef;
        transition: background-color 0.2s ease;
    }

    tbody td {
        padding: 10px;
        vertical-align: middle;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 8px 12px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.2s ease;
        font-size: 0.9rem;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .badge {
        font-size: 0.8rem;
        padding: 0.4em 0.6em;
        border-radius: 0.25rem;
    }

    .text-center {
        text-align: center;
    }
</style>
<?php echo $__env->make('admin_homepage.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/admin_homepage/show_user.blade.php ENDPATH**/ ?>