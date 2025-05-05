

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Conversation with User ID: <?php echo e($senderId); ?></h1>
        <div>
            <a href="<?php echo e(route('messages.create', ['recipientId' => $senderId])); ?>" class="btn btn-primary me-2">Reply</a>
            <a href="<?php echo e(route('messages.index')); ?>" class="btn btn-secondary">Back to Received Messages</a>
        </div>
    </div>

    <ul class="list-unstyled">
        <?php if($messages->isEmpty()): ?>
            <p>No messages in this conversation yet.</p>
        <?php else: ?>
            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="p-3 mb-2 <?php if($message->sender_id === Auth::id()): ?> bg-light <?php else: ?> bg-white <?php endif; ?> rounded">
                    <div>
                        <strong>
                            <?php if($message->sender_id === Auth::id()): ?>
                                You
                            <?php else: ?>
                                User ID: <?php echo e($message->sender_id); ?>

                            <?php endif; ?>
                        </strong>
                        <small class="text-muted float-end"><?php echo e($message->created_at->diffForHumans()); ?></small>
                        <p class="mt-1"><?php echo e($message->body); ?></p>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/messages/conversation.blade.php ENDPATH**/ ?>