<!-- admin_homepage/show_fraud_reports.blade.php --> 


<?php $__env->startSection('content'); ?>
        <h1>All Fraud Reports</h1>

        <?php if(session('success')): ?>
            <div class="alert alert-success text-center">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead class="bg-primary text-white">
                    <tr>
                        <th style="width: 15%;">Reported By</th>
                        <th style="width: 10%;">User ID</th>
                        <th style="width: 15%;">Fraud User ID</th>
                        <th style="width: 40%;">Message</th>
                        <th style="width: 10%;">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-light">
                    <?php $__currentLoopData = $fraudReports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($report->user->name); ?></td>
                            <td><?php echo e($report->user_id); ?></td>
                            <td><?php echo e($report->fraud_user_id); ?></td>
                            <td>
                                <div class="overflow-auto p-2 bg-white text-dark rounded" style="max-height: 100px; word-wrap: break-word; white-space: normal; border: 1px solid #ddd;">
                                    <?php echo e($report->message); ?>

                                </div>
                            </td>
                            <td>
                                <form action="<?php echo e(route('deleteFraudReport', $report->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
   
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin_homepage.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/admin_homepage/show_fraud_reports.blade.php ENDPATH**/ ?>