

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Message Details')); ?></div>

                <div class="card-body">
                    <p><strong><?php echo e(__('From User ID:')); ?></strong> <?php echo e($message->sender_id); ?></p>
                    <p><strong><?php echo e(__('To User ID:')); ?></strong> <?php echo e($message->recipient_id); ?></p>
                    <p><strong><?php echo e(__('Sent At:')); ?></strong> <?php echo e($message->created_at->format('Y-m-d H:i:s')); ?> (<?php echo e($message->created_at->diffForHumans()); ?>)</p>
                    <hr>
                    <p><?php echo e($message->body); ?></p>
                    <hr class="mt-4">
                    <h5><?php echo e(__('Reply to this Message')); ?></h5>
                    <form method="POST" action="<?php echo e(route('messages.send')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="recipient_id" value="<?php echo e($message->sender_id); ?>">

                        <div class="mb-3">
                            <label for="message" class="form-label"><?php echo e(__('Your Reply:')); ?></label>
                            <textarea class="form-control <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="message" name="message" rows="5" required></textarea>
                            <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary"><?php echo e(__('Send Reply')); ?></button>
                        </div>
                    </form>

                    <div class="mt-3">
                        <a href="<?php echo e(route('messages.index')); ?>" class="btn btn-secondary"><?php echo e(__('Back to Received Messages')); ?></a>
                        <a href="<?php echo e(route('messages.sent')); ?>" class="btn btn-outline-secondary"><?php echo e(__('Back to Sent Messages')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/messages/show.blade.php ENDPATH**/ ?>