

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>🚨 Report Fraud</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <form action="<?php echo e(url('/report-fraud')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="fraud_user_id" class="form-label">Fraud User ID:</label>
            <input type="number" name="fraud_user_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Describe the Issue:</label>
            <textarea name="message" class="form-control" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-danger">Submit Report</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/user_homepage/report_fraud.blade.php ENDPATH**/ ?>