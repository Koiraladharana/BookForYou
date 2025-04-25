

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 class="mb-4" style="color: #343a40;"><i class="fas fa-exclamation-triangle me-2"></i> All Fraud Reports</h1>

        <?php if(session('success')): ?>
            <div class="alert alert-success text-center">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th><i class="fas fa-user me-2"></i> Reported By</th>
                                <th class="text-center"><i class="fas fa-id-card me-2"></i> User ID</th>
                                <th class="text-center"><i class="fas fa-user-times me-2"></i> Fraud User ID</th>
                                <th><i class="fas fa-comment-dots me-2"></i> Report Message</th>
                                <th class="text-center"><i class="fas fa-trash-alt me-2"></i> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $fraudReports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($report->user->name); ?></td>
                                    <td class="text-center"><?php echo e($report->user_id); ?></td>
                                    <td class="text-center"><?php echo e($report->fraud_user_id); ?></td>
                                    <td>
                                        <div class="p-3 mb-2 bg-light text-dark rounded" style="max-height: 150px; overflow-y: auto; word-break: break-word;">
                                            <?php echo e($report->message); ?>

                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <form action="<?php echo e(route('deleteFraudReport', $report->id)); ?>" method="POST" style="display: inline;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this report?')"><i class="fas fa-trash-alt me-1"></i> Delete</button>
                                        </form>
                                    </td>
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

    .text-center {
        text-align: center;
    }

    /* Improved Message Styling */
    tbody td > div.bg-light {
        border: 1px solid #ddd;
    }
</style>
<?php echo $__env->make('admin_homepage.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/admin_homepage/show_fraud_reports.blade.php ENDPATH**/ ?>