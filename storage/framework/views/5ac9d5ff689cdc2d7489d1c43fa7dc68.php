

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Sent Messages')); ?></div>

                <div class="card-body">
                    <?php if($sentMessages->isEmpty()): ?>
                        <p><?php echo e(__('You have no sent messages.')); ?></p>
                    <?php else: ?>
                        <ul class="list-group">
                            <?php $__currentLoopData = $sentMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item">
                                    <strong><?php echo e(__('To User ID:')); ?> <?php echo e($message->recipient_id); ?></strong>
                                    <small class="text-muted float-end"><?php echo e($message->created_at->diffForHumans()); ?></small>
                                    <p><?php echo e(Str::limit($message->body, 50)); ?></p>
                                    <a href="<?php echo e(route('messages.show', $message->id)); ?>" class="btn btn-sm btn-outline-primary"><?php echo e(__('View Message')); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                        <div class="mt-3">
                            <?php echo e($sentMessages->links()); ?>

                        </div>
                    <?php endif; ?>
                    <div class="mt-3">
                        <a href="<?php echo e(route('messages.index')); ?>" class="btn btn-outline-secondary"><?php echo e(__('View Received Messages')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/messages/sent.blade.php ENDPATH**/ ?>