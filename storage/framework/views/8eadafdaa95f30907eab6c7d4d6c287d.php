<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Navigation Bar</title>
	
	<link rel="stylesheet" href="<?php echo e(asset('css/index.css')); ?>">
</head>
<body>
	<nav class="navbar">
		<div class="navdiv">
			<div class="logo"><a href="/">BookForYou</a> </div>
			<ul>
				<li><a href="/donation">Donation</a></li>
				<li><a href="/selling">Selling</a></li>
                <li><a href="/exchange">Exchange</a></li>
				<button><a href="/login">login</a></button>
				<button><a href="/register">Register</a></button>
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
					<img src="<?php echo e(asset('images/slide2.jpeg')); ?>" alt="carousel pic">
				</div>
				<div class="carousel-item">
					<img src="<?php echo e(asset('images/slide3.jpeg')); ?>" alt="carousel pic">
				</div>
				<div class="carousel-item">
					<img src="<?php echo e(asset('images/slide4.jpeg')); ?>" alt="carousel pic">
				</div>
				<div class="carousel-item">
					<img src="<?php echo e(asset('images/slide6.png')); ?>" alt="carousel pic">
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
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
		
	</div>
	
	<?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/homepage/header.blade.php ENDPATH**/ ?>