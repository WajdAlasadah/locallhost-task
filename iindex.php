<?php
$conn = new mysqli("localhost", "root", "", "users_db");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

 
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $age = $_POST['age'];
  $sql = "INSERT INTO users (name, age) VALUES ('$name', '$age')";
  $conn->query($sql);
}

 
if (isset($_POST['toggle'])) {
  $id = $_POST['toggle_id'];
  $result = $conn->query("SELECT status FROM users WHERE id=$id");
  $row = $result->fetch_assoc();
  $new_status = $row['status'] == 1 ? 0 : 1;
  $conn->query("UPDATE users SET status=$new_status WHERE id=$id");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Smart Methods Task</title>
  <style>
    body { font-family: Arial; padding: 20px; }
    form { margin-bottom: 20px; }
    table { border-collapse: collapse; width: 60%; }
    table, th, td { border: 1px solid #000; }
    th, td { padding: 8px; text-align: center; }
    input[type="text"], input[type="number"] {
      padding: 6px;
      margin: 5px;
    }
  </style>
</head>
<body>

<h2>Insert User</h2>
<form method="POST" action="">
  Name: <input type="text" name="name" maxlength="50" required>
  Age: <input type="number" name="age" required>
  <input type="submit" name="submit" value="Submit">
</form>

<h2>Users Table</h2>
<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Age</th>
    <th>Status</th>
    <th>Action</th>
  </tr>

  <?php
  $result = $conn->query("SELECT * FROM users");
  while ($row = $result->fetch_assoc()) {
    echo "<tr>
      <td>{$row['id']}</td>
      <td>{$row['name']}</td>
      <td>{$row['age']}</td>
      <td>{$row['status']}</td>
      <td>
        <form method='POST' style='display:inline'>
          <input type='hidden' name='toggle_id' value='{$row['id']}'>
          <input type='submit' name='toggle' value='Toggle'>
        </form>
      </td>
    </tr>";
  }
  ?>
</table>

</body>
</html>