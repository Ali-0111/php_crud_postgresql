<?php

  $host = 'localhost'; // PostgreSQL host
  $port = 5432; // PostgreSQL port
  $dbname = 'crud_project'; // database name
  $user = 'ali'; // user name
  $password = 'asdf@123'; // password 

  $con = "pgsql:user=$user;password=$password;dbname=$dbname;port=$port;host=$host;";
  
  try {
    $pdo = new PDO($con);
    echo '<p class="success">Connected to database<br></p>';
    
    // list all users
  	require 'list_user.php';
    require 'list_books.php';
    
  } catch(PDOException $e) {
    echo 'Connection to PostgreSQL failed: '.$e->getMessage();
  }

?>

