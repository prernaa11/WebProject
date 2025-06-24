<?php
session_start();
include '../db.php';

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM events");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>View Events</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center py-10">

  <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-5xl">
    <h2 class="text-3xl font-bold text-center text-indigo-600 mb-6">Event Management</h2>

    <div class="overflow-x-auto">
      <table class="table table-bordered table-hover w-full text-sm text-left">
        <thead class="bg-indigo-200 text-indigo-800">
          <tr>
            <th class="p-3">Fname</th>
            <th class="p-3">Lname</th>
            <th class="p-3">Events</th>
            <th class="p-3 text-center">payement</th>
            <th class="p-3 text-center">Status</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr class="border-b hover:bg-gray-50">
              <td class="p-3"><?= $row['fname'] ?></td>
              <td class="p-3"><?= htmlspecialchars($row['lname']) ?></td>
              <td class="p-3"><?= $row['events'] ?></td>
              <td class="p-3"><?= $row['payment'] ?></td>
              
              <td class="p-3 text-center">
                <a href="approve_event.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm me-2">Approve</a>
                <a href="reject_event.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Reject</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <div class="mt-6 text-center">
      <a href="dashboard.php" class="text-sm text-indigo-500 hover:underline">← Back to Dashboard</a>
    </div>
  </div>

</body>
</html>
