<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminPanel</title>
	
	<link rel="stylesheet" href="<?php echo e(asset('css/index.css')); ?>">
</head>
<body>
	<nav class="navbar">
		<div class="navdiv">
			<div class="logo"><a href="/">AdminPanel</a> </div>
			<ul>
				<li><a href="/donation">Donation</a></li>
				<li><a href="/selling">Selling</a></li>
                <li><a href="/exchange">Exchange</a></li>
				<form action="<?php echo e(route('logout')); ?>" method="POST" style="display:inline;">
					<?php echo csrf_field(); ?>
					<button type="submit" class="btn btn-danger">Logout</button>
				</form>
			</ul>
		</div>
	</nav>
	<?php echo $__env->make('admin_homepage.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/admin_homepage/header.blade.php ENDPATH**/ ?>