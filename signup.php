<?php
include '../db.php';
if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    if (mysqli_query($conn, $query)) {
        echo "User registered!";
        header('Location:login.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Responsive Sign Up Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            max-width: 900px;
            margin: 50px auto;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .form-box {
            flex: 1 1 400px;
            padding: 40px;
        }
        .form-box h2 {
            margin-bottom: 20px;
            font-size: 28px;
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
            padding: 10px 10px 10px 35px;
            width: 100%;
            border: none;
            border-bottom: 2px solid #ccc;
            outline: none;
        }
        .form-box .terms {
            font-size: 14px;
            display: flex;
            align-items: center;
            margin-top: 10px;
        }
        .form-box .register-btn {
            margin-top: 20px;
            padding: 12px;
            width: 100%;
            border: none;
            background-color: #5dade2;
            color: white;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }
        .form-box .login-link {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
        }
        .form-box .login-link a {
            text-decoration: none;
            color: #000;
            border-bottom: 1px solid #000;
        }
        .image-box {
            flex: 1 1 400px;
            background: url('img/signup_img.jpg') center/contain no-repeat;
            background-color: #ffffff;
            min-height: 300px;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                margin: 20px;
            }
            .image-box {
                order: -1;
                height: 200px;
                background-size: contain;
            }
        }

        @media (max-width: 480px) {
            .form-box {
                padding: 20px;
            }
        }
        .footer {
   
    padding: 20px 0;
    text-align: center;
    margin-top: 40px;
}

.footer-content {
    max-width: 900px;
    margin: 0 auto;
    padding: 0 20px;
}

.footer-links {
    margin-top: 10px;
}

.footer-links a {
    color: #ecf0f1;
    margin: 0 10px;
    text-decoration: none;
    font-size: 14px;
}

.footer-links a:hover {
    text-decoration: underline;
}

@media (max-width: 600px) {
    .footer-links {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }
}

    </style>
</head>
<body>
    <div class="container">
        <form class="form-box" method="POST" action="">
            <h2>Sign up</h2>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="name" placeholder="Your Name" required>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Your Email" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <label class="terms">
                <input type="checkbox" name="terms" required>
                I agree all statements in <a href="#">Terms of service</a>
            </label>

            <button type="submit" name="signup" class="register-btn">Register</button>
            <div class="login-link">
                <a href="login.php">I am already member</a>
            </div>
            <footer class="footer">
                <div class="footer-content">
                    <p>&copy; 2025 TheEvenet. All rights reserved.</p>
                    <div class="footer-links">
                            <a href="#">Privacy Policy</a>
                        <a href="#">Terms of Service</a>
                        <a href="#">Contact</a>
                    </div>
                </div>
            </footer>

        </form>
        <div class="image-box"></div>
    </div>
    <footer class="footer">
        <div class="footer-content">
        <p>&copy; 2025 TheEvent. All rights reserved.</p>
        <div class="footer-links">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
            <a href="#">Contact</a>
        </div>
        </div>
    </footer>

</body>
</html>
