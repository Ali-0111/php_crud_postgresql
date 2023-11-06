<?php
  $query = 'SELECT * FROM users';
  $result = $pdo->query($query);

  // Fetch and display the users
  echo '<h2>List of Users</h2>';
  echo '<ul>';
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $name = $row['name'];
      $age = $row['age'];
      $id = $row['id'];
      echo "<li><span>$name</span> <span>(Age: $age)</span><span>id:$id</span></li>";
  }
  echo '</ul>';
?>

<a href="./crud_users.php">CRUD OPERATION FOR USERS</a>
