<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page - Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional: Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }
        .login-container {
            max-width: 400px;
            width: 100%;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        }
        .card-header {
            background: transparent;
            border-bottom: none;
            text-align: center;
            padding: 30px 20px 10px;
        }
        .card-header h3 {
            color: #333;
            font-weight: 600;
            margin: 0;
        }
        .card-body {
            padding: 30px;
        }
        .form-floating {
            margin-bottom: 20px;
        }
        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            padding: 12px;
            transition: transform 0.2s, box-shadow 0.2s;
            width: 100%;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
            background: linear-gradient(135deg, #5a6fd6 0%, #6a4292 100%);
            color: white;
        }
        .form-control:focus {
            border-color: #764ba2;
            box-shadow: 0 0 0 0.2rem rgba(118, 75, 162, 0.25);
        }
        .text-muted a {
            color: #667eea;
            text-decoration: none;
        }
        .text-muted a:hover {
            color: #764ba2;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="card">
            <div class="card-header">
                <h3><i class="bi bi-shield-lock me-2"></i>Welcome Back</h3>
                <p class="text-muted mt-2">Please login to your account</p>
            </div>
            <div class="card-body">
                <form method="POST" action="login_action.php">
                    <!-- Username Field -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="" required>
                        <label for="username"><i class="bi bi-person me-2"></i>Username</label>
                    </div>

                    <!-- Password Field -->
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password" required>
                        <label for="password"><i class="bi bi-key me-2"></i>Password</label>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="rememberMe">
                            <label class="form-check-label text-muted" for="rememberMe">
                                Remember me
                            </label>
                        </div>
                        <a href="#" class="text-decoration-none">Forgot Password?</a>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="btn btn-login">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Login
                    </button>

                    <!-- Sign Up Link -->
                    <div class="text-center mt-4">
                        <span class="text-muted">Don't have an account?</span>
                        <a href="#" class="text-decoration-none ms-2">Sign Up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (optional, only needed if you want Bootstrap's JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>