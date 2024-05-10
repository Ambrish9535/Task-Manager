<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Task Management Application</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>Task Management Application</h1>
    <div class="form-container">
      <h2>Add New Task</h2>
      <form id="task-form" method="POST" action="">
        <input type="text" id="title" name="title" placeholder="Title" required>
        <input type="text" id="description" name="description" placeholder="Description">
        <input type="date" id="due-date" name="due-date" required>
        <button type="submit" id="submitButton" name="submitButton" onclick="showAlert()">Add Task</button>
      </form>
    </div>
    <div id="task-list"></div>
  </div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitButton'])) {
    include "db_conn.php";

    $title = $_POST['title'];
    $description = $_POST['description'];
    $dueDate = $_POST['due-date'];

    $stmt = $conn->prepare("INSERT INTO manager (title, des, date) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $description, $dueDate);

    if ($stmt->execute()) {
        echo '<div class="result-success">Task added successfully!</div>';
    } else {
        echo '<div class="result-error">Failed to add task. Please try again.</div>';
    }

    $stmt->close();
    $conn->close();
}
?>

  <script src="script.js"></script>
  <script>
    function showAlert() {
      alert("Task submitted successfully!");
    }
  </script>
</body>
</html>
