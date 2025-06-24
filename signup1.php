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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up</title>

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  
  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gradient-to-br from-blue-100 to-purple-200 min-h-screen flex items-center justify-center">

  <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md border border-gray-200">
    <h2 class="text-3xl font-bold mb-6 text-center text-indigo-600">Create Account</h2>

    <form method="POST" action="" class="space-y-4">
      <div>
        <label class="form-label block text-gray-700">Full Name</label>
        <input type="text" name="name" class="form-control rounded-lg focus:ring-2 focus:ring-indigo-400" placeholder="Enter your name" required>
      </div>

      <div>
        <label class="form-label block text-gray-700">Email</label>
        <input type="email" name="email" class="form-control rounded-lg focus:ring-2 focus:ring-indigo-400" placeholder="Enter your email" required>
      </div>

      <div>
        <label class="form-label block text-gray-700">Password</label>
        <input type="password" name="password" class="form-control rounded-lg focus:ring-2 focus:ring-indigo-400" placeholder="Enter password" required>
      </div>

      <div class="text-center">
        <input type="submit" name="signup" value="Sign Up" class="btn btn-primary w-full py-2 rounded-lg font-semibold">
      </div>
    </form>

    <p class="mt-4 text-center text-sm text-gray-600">Already have an account?
      <a href="login.php" class="text-indigo-500 hover:underline">Login here</a>
      <a href="logout.php" class="text-indigo-500 hover:underline">logout here</a>
    </p>
  </div>
 

</body>
</html>
