<?php
session_start();
include '../db.php';

$msg = "";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $new_password = $_POST['password'];

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    
    if (mysqli_num_rows($check) > 0) {
        mysqli_query($conn, "UPDATE users SET password='$new_password' WHERE email='$email'");
        $msg = "<div class='alert alert-success text-center'>Password updated successfully. <a href='login.php'>Login now</a></div>";
    } else {
        $msg = "<div class='alert alert-danger text-center'>Email not found in our records.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Forgot Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f5f9ff;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .forgot-container {
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      display: flex;
      max-width: 900px;
      width: 100%;
      overflow: hidden;
    }
    .forgot-left {
      background-color: #eaf2ff;
      padding: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 50%;
    }
    .forgot-left img {
      max-width: 100%;
    }
    .forgot-right {
      padding: 40px;
      width: 50%;
    }
    .forgot-right h3 {
      color: #1a1a1a;
      font-weight: 600;
      margin-bottom: 20px;
      text-align: center;
    }
    .btn-primary {
      background-color: #0069d9;
      border: none;
    }
    .btn-primary:hover {
      background-color: #0056b3;
    }
    .back-link {
      display: block;
      text-align: center;
      margin-top: 15px;
      color: #6c757d;
      text-decoration: none;
    }
    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="forgot-container">
  <div class="forgot-left">
    <img src="img/Capture1.png" alt="Forgot Password" />
    <!-- Replace 'forgot-illustration.png' with your image file -->
  </div>
  <div class="forgot-right">
    <h3>Forgot Password</h3>
    <?= $msg ?>
    <form method="POST" action="">
      <div class="mb-3">
        <label class="form-label">Email Address</label>
        <input type="email" name="email" class="form-control" required placeholder="Enter your registered email">
      </div>
      <div class="mb-3">
        <label class="form-label">New Password</label>
        <input type="password" name="password" class="form-control" required placeholder="Enter new password">
      </div>
      <button type="submit" name="submit" class="btn btn-primary w-100">Reset Password</button>
    </form>
    <a class="back-link" href="login.php">Back to Sign In</a>
  </div>
</div>

</body>
</html>
