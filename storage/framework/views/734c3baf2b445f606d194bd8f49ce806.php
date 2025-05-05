

<?php $__env->startSection('content'); ?>
    <h1>Send New Message</h1>

    <p>Recipient ID from URL: <?php echo e($recipientId ?? 'Not set'); ?></p>

    <form action="<?php echo e(route('messages.send')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="recipient_id" class="form-label">Recipient User ID:</label>
            <input type="text" class="form-control" id="recipient_id" name="recipient_id"
                   value="<?php echo e($recipientId ?? ''); ?>" <?php echo e(isset($recipientId) ? 'readonly' : ''); ?> required>
            <?php $__errorArgs = ['recipient_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <?php if(isset($recipientId)): ?>
                <small class="form-text text-muted">Replying to User ID: <?php echo e($recipientId); ?></small>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message:</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <button type="submit" class="btn btn-primary">Send Message</button>
        <a href="<?php echo e(route('messages.index')); ?>" class="btn btn-secondary ms-2">Cancel</a>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/messages/create.blade.php ENDPATH**/ ?>