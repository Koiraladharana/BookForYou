<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Second Hand Selling</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/index.css')); ?>">
</head>
<body>
    <nav class="navbar">
        <div class="navdiv">
            <div class="logo"><a href="/">BookForYou</a></div>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/donation">Donation</a></li>
                <li><a href="/exchange">Exchange</a></li>

                <?php if(auth()->guard()->check()): ?>
                <li class="dropdown">
                    <a href="/user" class="dropbtn">👤<?php echo e(Auth::user()->name); ?></a>
                    <div class="dropdown-content">
                        <form action="<?php echo e(route('logout')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="logout-btn">Logout</button>
                        </form>
                    </div>
                </li>
                <?php else: ?>
                <button><a href="<?php echo e(route('login')); ?>">Login</a></button>
                <button><a href="<?php echo e(route('reguser')); ?>">Register</a></button>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="main">
        <div class="carousel">
            <div class="carousel-track">
                <div class="carousel-item">
                    <img src="<?php echo e(asset('images/slide1.jpeg')); ?>" alt="carousel pic">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo e(asset('images/slide3.jpeg')); ?>" alt="carousel pic">
                </div>
            </div>
        </div>

        <div class="book-container">
            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="book-card">
                <a href="<?php echo e(Auth::check() ? route('usersee', $book->id) : route('login', ['redirect' => route('usersee', $book->id)])); ?>">
                    <img src="<?php echo e(asset('storage/' . $book->photo)); ?>" alt="Book Image">
					<p><strong>User ID:</strong> <?php echo e($book->user_id); ?></p>
                    <h3><?php echo e($book->book_name); ?></h3>
                    <p><strong>Book Name:</strong> <?php echo e($book->name); ?></p>
                <p><strong>Price:</strong> R.S.<?php echo e($book->price ?? 'Not specified'); ?></p>
                <p><strong>Category:</strong> <?php echo e($book->category); ?></p>
                <p><strong>Status:</strong> 
                    <span class="status-box">Available</span>
                </p>

                <?php if(auth()->guard()->guest()): ?>
                <div class="hover-message">Login to see more details</div>
                <?php endif; ?>
				</a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		
        </div>
    </div>

    <script src="<?php echo e(asset('js/index.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/homepage/selling.blade.php ENDPATH**/ ?>