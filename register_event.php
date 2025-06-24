<?php
include '../db.php';

$msg = "";

if (isset($_POST['submit'])) {
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $event = mysqli_real_escape_string($conn, $_POST['event']);
    $payment = mysqli_real_escape_string($conn, $_POST['payment']);

    $query = "INSERT INTO events (fname, lname, email, phone, address, gender, events, payment) 
              VALUES ('$fname', '$lname', '$email', '$phone', '$address', '$gender', '$event', '$payment')";

    if (mysqli_query($conn, $query)) {
        $msg = "<div class='alert alert-success text-center'>Registration successful!</div>";
    } else {
        $msg = "<div class='alert alert-danger text-center'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register Event</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  
  <style>
    body {
      background-image: url('newimage.jpg'); 
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    .form-container {
      background: rgba(255, 255, 255, 0.9);
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.25);
      width: 100%;
      max-width: 600px;
    }
  </style>

</head>
<body>

  <div class="form-container">
    <?php if (!empty($msg)) echo $msg; ?>

    <h2 class="text-center mb-4">Event Registration Form</h2>
    
    <form method="POST" action="" class="">

      <div class="mb-3">
        <label class="form-label">First Name</label>
        <input type="text" name="fname" class="form-control" required />
      </div>

      <div class="mb-3">
        <label class="form-label">Last Name</label>
        <input type="text" name="lname" class="form-control" required />
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required />
      </div>

      <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" required />
      </div>

      <div class="mb-3">
        <label class="form-label">Address</label>
        <textarea name="address" class="form-control" rows="3" required></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label d-block">Gender</label>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" value="Male" required />
          <label class="form-check-label">Male</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" value="Female" required />
          <label class="form-check-label">Female</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" value="Other" required />
          <label class="form-check-label">Other</label>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Event Type</label>
        <select name="event" class="form-control" required>
          <option value="" disabled selected>Select an event</option>
          <option value="Webinar">Webinar</option>
          <option value="Conference">Conference</option>
          <option value="Holiday & Celebration Events">Holiday & Celebration Events</option>
          <option value="Team Building and Employee Engagement">Team Building and Employee Engagement</option>
          <option value="Awards & Recognition Events">Awards & Recognition Events</option>
          <option value="Training & Development Programs">Training & Development Programs</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Payment Method</label>
        <select name="payment" class="form-control" required>
          <option value="" disabled selected>Select payment method</option>
          <option value="Credit Card">Credit Card</option>
          <option value="PayPal">PayPal</option>
          <option value="Bank Transfer">Bank Transfer</option>
        </select>
      </div>

      <button type="submit" name="submit" class="btn btn-primary w-100">Register</button>
    </form>
  </div>

</body>
</html>
