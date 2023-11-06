<?php
$host = 'localhost'; // PostgreSQL host
$port = 5432; // PostgreSQL port
$dbname = 'crud_project'; // database name
$user = 'ali'; // user name
$password = 'asdf@123'; // password

$con = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";

try {
    $pdo = new PDO($con);
    
    // Function to create a user
    function createUser($name, $age)
    {
        global $pdo;

        try {
            $query = "INSERT INTO users (name, age) VALUES (?, ?)";
            $query = $pdo->prepare($query);
            $query->execute([$name, $age]);
            echo 'User created successfully.';
        } catch (PDOException $e) {
            echo 'Failed to create user: ' . $e->getMessage();
        }
    }

    // Function to delete a user
    function deleteUser($userId)
    {
        global $pdo;

        try {
            $query = "DELETE FROM users WHERE id = ?";
            $query = $pdo->prepare($query);
            $query->execute([$userId]);
            echo 'User deleted successfully.';
        } catch (PDOException $e) {
            echo 'Failed to delete user: ' . $e->getMessage();
        }
    }

    // Function to update a user
    function updateUser($userId, $name, $age)
    {
        global $pdo;

        try {
            $query = "UPDATE users SET name = ?, age = ? WHERE id = ?";
            $query = $pdo->prepare($query);
            $query->execute([$name, $age, $userId]);
            echo 'User updated successfully.';
        } catch (PDOException $e) {
            echo 'Failed to update user: ' . $e->getMessage();
        }
    }

    // Handle form submission for creating a user
    if (isset($_POST['create'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        createUser($name, $age);
    }

    // Handle form submission for deleting a user
    if (isset($_POST['delete'])) {
        $userId = $_POST['user_id'];
        deleteUser($userId);
    }

    // Handle form submission for updating a user
    if (isset($_POST['update'])) {
        $userId = $_POST['user_id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        updateUser($userId, $name, $age);
    }

} catch (PDOException $e) {
    echo 'Connection to PostgreSQL failed: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
    <title>User Management</title>
</head>
<body>
    <!-- Create User Form -->
    <h2>Create User</h2>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>
        <button type="submit" name="create">Create</button>
    </form>

    <!-- Delete User Form -->
    <h2>Delete User</h2>
    <form method="POST">
        <label for="user_id">User ID:</label>
        <input type="number" id="user_id" name="user_id" required>
        <button type="submit" name="delete">Delete</button>
    </form>

    <!-- Update User Form -->
    <h2>Update User</h2>
    <form method="POST">
        <label for="user_id">User ID:</label>
        <input type="number" id="user_id" name="user_id" required>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>