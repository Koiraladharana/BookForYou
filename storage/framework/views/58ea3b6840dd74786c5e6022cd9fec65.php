<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #9292f3;
            margin: 7%;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-container {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .form-group input, 
        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9ff;
        }

        .form-footer {
            margin-top: 15px;
            font-size: 14px;
        }

        .form-footer a {
            color: #007bff;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        .form-actions {
            margin-top: 15px;
        }

        .form-actions button {
            background-color: #3c4858;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .form-actions button:hover {
            background-color: #2e3b47;
        }
        .text-danger{
            color: rgb(233, 14, 14);
        }
        .form-group input.error {
            border-color: red;
            background-color: rgb(240, 185, 185);
        }
    </style>
</head>
<body>
    <div class="register-container">
        <form method="POST" action="<?php echo e(route('reguser')); ?>">
            <?php echo csrf_field(); ?>
            <!-- Register as -->
           <div><a href="/"><h1>BookForYou</h1></a></div>
            <!-- Name -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" value="<?php echo e(old('name')); ?>" class="<?php echo e($errors->has('name') ? 'error' : ''); ?>" id="name" placeholder="Enter your name" name="name">
                <span class="text-danger">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <?php echo e($message); ?>

                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </span>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" value="<?php echo e(old('email')); ?>" class="<?php echo e($errors->has('email') ? 'error' : ''); ?>" id="email" placeholder="Enter your email" name="email">
                <span class="text-danger">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <?php echo e($message); ?>

                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </span>
            </div>

            <!-- Phone -->
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="number" value="<?php echo e(old('phone')); ?>" class="<?php echo e($errors->has('phone') ? 'error' : ''); ?>" id="phone" placeholder="Enter your phone number"  name="phone" oninput="validatePhone(this)">
                <span class="text-danger">
                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <?php echo e($message); ?>

                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </span>
            </div>

            <!-- Address -->
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" value="<?php echo e(old('address')); ?>" class="<?php echo e($errors->has('address') ? 'error' : ''); ?>" id="address" placeholder="Enter your address" name="address">
                <span class="text-danger">
                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <?php echo e($message); ?>

                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </span>
            </div>

            <!----collage name ---->
            <div class="form-group">
                <label for="college">College Name</label>
                <input type="text" value="<?php echo e(old('college')); ?>" class="<?php echo e($errors->has('college') ? 'error' : ''); ?>" id="name" placeholder="Enter your college name" name="college">
                <span class="text-danger">
                    <?php $__errorArgs = ['college'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <?php echo e($message); ?>

                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </span>
            </div>

            <!---faculty name ----->
            <div class="form-group">
                <label for="faculty">Faculty</label>
                <input type="text" value="<?php echo e(old('faculty')); ?>" class="<?php echo e($errors->has('faculty') ? 'error' : ''); ?>" id="name" placeholder="Enter your faculty" name="faculty">
                <span class="text-danger">
                    <?php $__errorArgs = ['faculty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <?php echo e($message); ?>

                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </span>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="<?php echo e($errors->has('password') ? 'error' : ''); ?>" id="password" placeholder="Enter your password" name="password">
                <span class="text-danger">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <?php echo e($message); ?>

                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </span>
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="<?php echo e($errors->has('password_confirmation') ? 'error' : ''); ?>" id="password_confirmation" placeholder="Confirm your password" name="password_confirmation">
                <span class="text-danger">
                    <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                       <?php echo e($message); ?>

                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </span>
            </div>


            <!-- Already registered -->
            <div class="form-footer">
                <a href="/login">Already registered?</a>
            </div>

            <!-- Register button -->
            <div class="form-actions">
                <button type="submit">REGISTER</button>
            </div>
        </form>
    </div>

    <script>
        function validatePhone(input) {
            // Remove non-numeric characters and limit to 10 digits
            input.value = input.value.replace(/\D/g, '').slice(0, 10);
        }
    </script>
    
</body>
</html><?php /**PATH C:\xampp\htdocs\BookForYou\resources\views/log_reg/register.blade.php ENDPATH**/ ?>