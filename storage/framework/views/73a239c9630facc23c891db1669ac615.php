
<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Welcome to Admin Panel</h1>
        <div class="stats">
            <div class="stat-box">
                <h3>Total Books</h3>
                <p><?php echo e($totalBooks); ?></p>
            </div>
            <div class="stat-box">
                <h3>Total Users</h3>
                <p><?php echo e($totalUsers); ?></p>
            </div>
            <div class="stat-box">
                <h3>Total Admins</h3>
                <p><?php echo e($totalAdmins); ?></p>
            </div>
			<div class="stat-box">
                <h3>Total Fraud Reports</h3>
                <p><?php echo e($totalFrauds); ?></p>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
	<?php echo $__env->make('admin_homepage.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('admin_homepage.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/admin_homepage/header.blade.php ENDPATH**/ ?>