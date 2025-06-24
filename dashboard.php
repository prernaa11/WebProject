<?php
session_start();
include '../db.php';
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

$userCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM users"))['count'];
$eventCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM events"))['count'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Evenet Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css' rel='stylesheet' />
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js'></script>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .brand {
      font-size: 1.5rem;
      font-weight: bold;
      color: #8B5CF6;
    }
  </style>
</head>
<body class="bg-gray-100 min-h-screen">
  <div class="flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md min-h-screen px-6 py-8 flex flex-col justify-between">
      <div>
        <div class="text-center brand mb-8">The Evenet</div>
        <ul class="space-y-4 text-sm">
          <li><a href="#" class="flex items-center space-x-2 text-purple-600 font-semibold"><span>Dashboard</span></a></li>
          <li><a href="view_users.php" class="flex items-center space-x-2 text-gray-700 hover:text-purple-600"><span>View Users</span></a></li>
          <li><a href="view_events.php" class="flex items-center space-x-2 text-gray-700 hover:text-purple-600"><span>View Events</span></a></li>
          <li><a href="#calendar" class="flex items-center space-x-2 text-gray-700 hover:text-purple-600"><span>Calendar</span></a></li>
          <li><a href="#" class="flex items-center space-x-2 text-gray-700 hover:text-purple-600"><span>Bookings</span></a></li>
          <li><a href="#" class="flex items-center space-x-2 text-gray-700 hover:text-purple-600"><span>Invoices</span></a></li>
          <li><a href="#" class="flex items-center space-x-2 text-gray-700 hover:text-purple-600"><span>Events</span></a></li>
          <li><a href="#" class="flex items-center space-x-2 text-gray-700 hover:text-purple-600"><span>Financials</span></a></li>
        </ul>
      </div>
      <div>
        <a href="logout.php" class="flex items-center space-x-2 text-red-600 hover:text-red-800 font-semibold"><span>Logout</span></a>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-10">
      <div class="bg-white p-6 rounded-xl shadow-md mb-8">
        <div class="flex justify-between items-center mb-6">
          <h1 class="text-2xl font-bold text-gray-800">Welcome, Admin</h1>
          <span class="text-sm text-gray-500">The Evenet Dashboard</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <div class="bg-purple-100 p-6 rounded-xl text-center shadow">
            <h3 class="text-gray-700 font-medium">Total Users</h3>
            <p class="text-3xl font-bold text-purple-700 mt-2"><?php echo $userCount; ?></p>
          </div>

          <div class="bg-indigo-100 p-6 rounded-xl text-center shadow">
            <h3 class="text-gray-700 font-medium">Total Events</h3>
            <p class="text-3xl font-bold text-indigo-700 mt-2"><?php echo $eventCount; ?></p>
          </div>

          <!-- <div class="bg-pink-100 p-6 rounded-xl text-center shadow">
            <h3 class="text-gray-700 font-medium">Tickets Sold</h3>
            <p class="text-3xl font-bold text-pink-600 mt-2">1,250</p>
          </div> -->
        </div>

        <div class="mt-10 flex justify-center gap-4">
          <a href="view_users.php" class="px-6 py-2 bg-purple-600 text-white rounded-lg shadow hover:bg-purple-700">View Users</a>
          <a href="view_events.php" class="px-6 py-2 border border-purple-600 text-purple-600 rounded-lg shadow hover:bg-purple-100">View Events</a>
        </div>
      </div>

     
  <script>
  //   document.addEventListener('DOMContentLoaded', function () {
  //     var calendarEl = document.getElementById('eventCalendar');
  //     var calendar = new FullCalendar.Calendar(calendarEl, {
  //       initialView: 'dayGridMonth',
  //       height: 500,
  //       events: [
  //         {
  //           title: 'Music Festival',
  //           start: '2029-04-20',
  //           end: '2029-04-20'
  //         },
  //         {
  //           title: 'Corporate Meetup',
  //           start: '2029-04-25'
  //         },
  //         {
  //           title: 'Fashion Expo',
  //           start: '2029-05-10'
  //         }
  //       ]
  //     });
  //     calendar.render();
  //   });
  // </script>
</body>
</html>

