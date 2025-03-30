<!-- <!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
<h2>Register</h2>
<?php if(session('success')): ?>
    <p style="color: green"><?php echo e(session('success')); ?></p>
<?php endif; ?>
<form action="<?php echo e(route('register.post')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" required><br><br>
    <button type="submit">Register</button>
</form>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        body {
            background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .register-box {
            background-color: #ffffff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 400px;
        }

        .register-box h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .register-box input {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 18px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .register-box input:focus {
            border-color: #6c63ff;
            outline: none;
            box-shadow: 0 0 8px rgba(108, 99, 255, 0.3);
        }

        .register-box button {
            width: 100%;
            padding: 14px;
            background-color: #6c63ff;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .register-box button:hover {
            background-color: #574fd6;
        }

        .message {
            text-align: center;
            color: green;
            margin-bottom: 15px;
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .login-link a {
            color: #6c63ff;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="register-box">
    <h2>Register</h2>

    <?php if(session('success')): ?>
        <p class="message"><?php echo e(session('success')); ?></p>
    <?php endif; ?>

    <form action="<?php echo e(route('register.post')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        <button type="submit">Register</button>
    </form>

    <div class="login-link">
        Already registered? <a href="<?php echo e(route('login')); ?>">Login</a>
    </div>
</div>

</body>
</html>

<?php /**PATH C:\Users\hp\Downloads\Babeesna\myapp\resources\views/auth/register.blade.php ENDPATH**/ ?>