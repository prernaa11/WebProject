<?php
session_start();
include '../db.php';
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['user'] = $email;
        header('Location:event.php');
    } else {
        echo "Login failed!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Responsive Login Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f5f5f5;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            max-width: 900px;
            height: 500px;
            margin: 90px auto;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .image-box {
            flex: 1 1 400px;
            background: url('img/signup_img.jpg') center/contain no-repeat;
            background-color: #fff;
            min-height: 300px;
        }

        .form-box {
            flex: 1 1 400px;
            padding: 40px;
        }

        .form-box h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
        }

        .input-group input {
            width: 100%;
            padding: 10px 10px 10px 35px;
            border: none;
            border-bottom: 2px solid #ccc;
            outline: none;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .checkbox-group input {
            margin-right: 10px;
        }

        .form-box .login-btn {
            padding: 12px;
            width: 100%;
            border: none;
            background-color: #5dade2;
            color: white;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-box .extra-links {
            margin-top: 15px;
            font-size: 14px;
            text-align: center;
        }

        .form-box .extra-links a {
            text-decoration: none;
            color: #333;
            border-bottom: 1px solid #333;
        }

        .social-login {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-login a {
            color: white;
            padding: 10px 15px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }

        .social-login a.facebook { background: #3b5998; }
        .social-login a.twitter  { background: #00acee; }
        .social-login a.google   { background: #db4437; }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                margin: 20px;
            }

            .image-box {
                height: 200px;
                background-size: contain;
                order: -1;
            }
        }

        @media (max-width: 480px) {
            .form-box {
                padding: 20px;
            }
        }
        .footer {
    text-align: center;
    padding: 20px;
    background-color: #f0f0f0;
    color: #555;
    font-size: 14px;
    margin-top: 30px;
    border-top: 1px solid #ddd;
}

@media (max-width: 480px) {
    .footer {
        font-size: 12px;
        padding: 15px;
    }
}

    </style>
</head>
<body>

<div class="container">
    <div class="image-box"></div>

    <form class="form-box" method="POST" action="">
        <h2>Login here</h2>

        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" placeholder="Your Email" required>
        </div>

        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required>
        </div>

        
        <div style="text-align: right; margin-bottom: 15px;">
    <a href="forgot_password.php" style="font-size: 14px; color: #5dade2; text-decoration: none;">Forgot Password?</a>
</div>

        <button type="submit" name="login"  class="login-btn">Log in</button>

        <div class="extra-links">
            <p>Don't have an account? <a href="register.php">Create an account</a></p>
        </div>

        <div class="social-login">
            <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" class="google"><i class="fab fa-google"></i></a>
        </div>
    </form>


</div>
 <footer class="footer">
    <p>&copy; 2025 TheEvenet. All rights reserved.</p>
</footer>
    

</body>
</html>
