<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Customer Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #FAA919, #80C65A);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 35px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
            font-size: 22px;
        }

        .form-group {
            margin-bottom: 18px;
            position: relative;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
            color: #333;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 10px 14px;
            padding-right: 40px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            color: #333;
            background-color: #f9f9f9;
        }

        input:focus {
            border-color: #FAA718;
            outline: none;
            background-color: #fff;
        }

        .toggle-password {
            position: absolute;
            top: 30px;
            right: 12px;
            cursor: pointer;
            font-size: 18px;
            color: #888;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #FAA718;
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #e29105;
        }

        .login-link {
            text-align: center;
            margin-top: 18px;
            font-size: 14px;
        }

        .login-link a {
            color: #FAA718;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .container {
                padding: 25px 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Create Your Account</h2>
        <form action="{{ route('customer.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="John Doe"
                    value="{{ old('name') }}" />
                @error('name')
                    <p style="color:red; margin-top:5px;">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="phone">Username (Phone)</label>
                <input type="text" id="phone" name="phone" class="form-control" placeholder="017XXXXXXXX"
                    value="{{ old('phone') }}" />
                @error('phone')
                    <p style="color:red; margin-top:5px;">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mb-3 position-relative">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" />
                <span class="toggle-password" onclick="togglePassword('password', this)"
                    style="position:absolute; right:10px; cursor:pointer;">👁️</span>
                @error('password')
                    <p style="color:red; margin-top:5px;">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mb-3 position-relative">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="••••••••" />
                <span class="toggle-password" onclick="togglePassword('password_confirmation', this)"
                    style="position:absolute; right:10px; cursor:pointer;">👁️</span>
                @error('password_confirmation')
                    <p style="color:red; margin-top:5px;">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Register</button>

            <div class="login-link mt-3 text-center">
                Already have an account? <a href="{{ route('customer.login') }}">Login</a>
            </div>
        </form>
    </div>

    <script>
        function togglePassword(id, el) {
            const input = document.getElementById(id);
            const isPassword = input.type === 'password';
            input.type = isPassword ? 'text' : 'password';
            el.textContent = isPassword ? '🙈' : '👁️';
        }
    </script>
</body>

</html>
