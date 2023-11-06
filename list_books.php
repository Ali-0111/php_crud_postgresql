<?php
  $query = 'SELECT * FROM books';
  $result = $pdo->query($query);

  // Fetch and display the users
  echo '<h2>List of Books</h2>';
  echo '<ul>';
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $id = $row['id'];
      $book_name = $row['book_name'];
      $user_id = $row['user_id'];

      echo "<li><span>id: $id)</span> <span>$book_name </span><span>(User_id: $user_id)</span> </li>";
  }
  echo '</ul>';
?>

<a href="./crud_books.php">CRUD OPERATION FOR BOOKS</a>