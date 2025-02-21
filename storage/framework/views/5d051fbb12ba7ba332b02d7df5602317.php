<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Donation</title>
	<link rel="stylesheet" href="<?php echo e(asset('css/index.css')); ?>">
</head>
<body>
	<nav class="navbar">
		<div class="navdiv">
			<div class="logo"><a href="/user">BookForYou</a> </div>
			<ul>
				<li><a href="/user">Home</a></li>
				<li><a href="/sell">Selling</a></li>
                <li><a href="/swap">Exchange</a></li>
				<form action="<?php echo e(route('logout')); ?>" method="POST" style="display:inline;">
					<?php echo csrf_field(); ?>
					<button type="submit" class="logout-btn">Logout</button>
				</form>
		</div>
	</nav>
	<div class="main">
		<div class="carousel">
			<div class="carousel-track">
				<div class="carousel-item">
					<img src="<?php echo e(asset('images/slide5.jpeg')); ?>" alt="carousel pic">
				</div>
				<div class="carousel-item">
					<img src="<?php echo e(asset('images/slide2.jpeg')); ?>" alt="carousel pic">
				</div>
			</div>
		</div>

<div class="book-container">
	<?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="book-card">
		<img src="<?php echo e(asset('storage/' . $book->photo)); ?>" alt="Book Image">
		<p><strong>Book name:</strong> <?php echo e($book->name); ?></p>
		<p><strong>Author:</strong> <?php echo e($book->author ?? 'Unknown'); ?></p>
		<p><strong>Category:</strong> <?php echo e($book->category); ?></p>
		<p><strong>Location:</strong> <?php echo e($book->location); ?></p>
		<p><strong>Price:</strong> $<?php echo e($book->price); ?></p>
		<p><strong>Status:</strong> <?php echo e($book->status); ?></p>
		<p><strong>Email:</strong> <?php echo e($book->email); ?></p>
		<?php if($book->phone): ?>
        <p><strong>Phone:</strong> <?php echo e($book->phone); ?></p>
    <?php endif; ?>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
		</div>
		<script src="<?php echo e(asset('js/index.js')); ?>"></script>
		
	
</body>
</html><?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/user_homepage/donate.blade.php ENDPATH**/ ?>