

<?php $__env->startSection('content'); ?>
    <h1>Received Messages</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if($receivedMessages->isEmpty()): ?>
        <p>No messages received.</p>
    <?php else: ?>
        <ul class="list-unstyled">
            <?php $__currentLoopData = $receivedMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $senderId => $messagesFromSender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $latestMessage = $messagesFromSender->first();
                    $unreadCount = $messagesFromSender->where('read_at', null)->count();
                ?>
                <li class="d-flex justify-content-between align-items-center p-3 mb-2 bg-light rounded">
                    <div>
                        <i class="fas fa-user-circle me-2"></i> User ID: <?php echo e($senderId); ?><br>
                        <small class="text-muted"><i class="far fa-clock me-1"></i> <?php echo e($latestMessage->created_at->diffForHumans()); ?></small>
                        <p class="mt-1">
                            <?php if($messagesFromSender->count() > 1): ?>
                                <a href="<?php echo e(route('messages.conversation', $senderId)); ?>">
                                    <?php echo e(Str::limit($latestMessage->body, 80)); ?> (<?php echo e($messagesFromSender->count()); ?> messages)
                                </a>
                            <?php else: ?>
                                <a href="<?php echo e(route('messages.show', $latestMessage->id)); ?>">
                                    <?php echo e(Str::limit($latestMessage->body, 80)); ?>

                                </a>
                            <?php endif; ?>
                        </p>
                        <?php if($unreadCount > 0): ?>
                            <span class="badge bg-warning"><?php echo e($unreadCount); ?> Unread</span>
                        <?php endif; ?>
                    </div>
                    <div>
                        <a href="<?php echo e(route('messages.conversation', $senderId)); ?>" class="btn btn-sm btn-outline-primary me-2" title="View Conversation"><i class="far fa-envelope-open"></i></a>
                        <form action="<?php echo e(route('messages.destroy-conversation', $senderId)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-outline-danger ms-2" title="Delete Conversation" onclick="return confirm('Are you sure you want to delete all messages from this user?')"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/messages/index.blade.php ENDPATH**/ ?>