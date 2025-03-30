<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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

        .login-box {
            background-color: #ffffff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 400px;
        }

        .login-box h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .login-box input {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 18px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .login-box input:focus {
            border-color: #6c63ff;
            outline: none;
            box-shadow: 0 0 8px rgba(108, 99, 255, 0.3);
        }

        .login-box button {
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

        .login-box button:hover {
            background-color: #574fd6;
        }

        .message {
            text-align: center;
            margin-bottom: 15px;
        }

        .message.success {
            color: green;
        }

        .message.error {
            color: red;
        }

        .register-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .register-link a {
            color: #6c63ff;
            text-decoration: none;
            font-weight: bold;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login</h2>

    @if(session('success'))
        <p class="message success">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p class="message error">{{ session('error') }}</p>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <div class="register-link">
        Don't have an account? <a href="{{ route('register') }}">Register</a>
    </div>
</div>

</body>
</html>
