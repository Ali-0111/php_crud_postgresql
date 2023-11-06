<?php
$host = 'localhost'; // PostgreSQL host
$port = 5432; // PostgreSQL port
$dbname = 'crud_project'; // database name
$user = 'ali'; // user name
$password = 'asdf@123'; // password

$con = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";

try {
    $pdo = new PDO($con);

    // Function to create a book
    function createBook($bookName, $userId)
    {
        global $pdo;

        try {
            $query = "INSERT INTO books (book_name, user_id) VALUES (?, ?)";
            $query = $pdo->prepare($query);
            $query->execute([$bookName, $userId]);
            echo 'Book created successfully.';
        } catch (PDOException $e) {
            echo 'Failed to create book: ' . $e->getMessage();
        }
    }

    // Function to delete a book
    function deleteBook($bookId)
    {
        global $pdo;

        try {
            $query = "DELETE FROM books WHERE id = ?";
            $query = $pdo->prepare($query);
            $query->execute([$bookId]);
            echo 'Book deleted successfully.';
        } catch (PDOException $e) {
            echo 'Failed to delete book: ' . $e->getMessage();
        }
    }

    // Function to update a book
    function updateBook($bookId, $bookName, $userId)
    {
        global $pdo;

        try {
            $query = "UPDATE books SET book_name = ?, user_id = ? WHERE id = ?";
            $query = $pdo->prepare($query);
            $query->execute([$bookName, $userId, $bookId]);
            echo 'Book updated successfully.';
        } catch (PDOException $e) {
            echo 'Failed to update book: ' . $e->getMessage();
        }
    }

    // Handle form submission for creating a book
    if (isset($_POST['create_book'])) {
        $bookName = $_POST['book_name'];
        $userId = $_POST['user_id'];
        createBook($bookName, $userId);
    }

    // Handle form submission for deleting a book
    if (isset($_POST['delete_book'])) {
        $bookId = $_POST['delete_book_id'];
        deleteBook($bookId);
    }

    // Handle form submission for updating a book
    if (isset($_POST['update_book'])) {
        $bookId = $_POST['update_book_id'];
        $bookName = $_POST['update_book_name'];
        $userId = $_POST['update_user_id'];
        updateBook($bookId, $bookName, $userId);
    }
} catch (PDOException $e) {
    echo 'Database connection failed: ' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Management</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Book Management</h1>

    <!-- Create Book Form -->
    <h2>Create Book</h2>
    <form method="POST" action="">
        <label for="book_name">Book Name:</label>
        <input type="text" name="book_name" required><br>

        <label for="user_id">User ID:</label>
        <input type="number" name="user_id" required><br>

        <input type="submit" name="create_book" value="Create Book">
    </form>

    <!-- Delete Book Form -->
    <h2>Delete Book</h2>
    <form method="POST" action="">
        <label for="delete_book_id">Book ID:</label>
        <input type="number" name="delete_book_id" required><br>

        <input type="submit" name="delete_book" value="Delete Book">
    </form>

    <!-- Update Book Form -->
    <h2>Update Book</h2>
    <form method="POST" action="">
        <label for="update_book_id">Book ID:</label>
        <input type="number" name="update_book_id" required><br```php
        <label for="update_book_name">New Book Name:</label>
        <input type="text" name="update_book_name" required><br>

        <label for="update_user_id">New User ID:</label>
        <input type="number" name="update_user_id" required><br>

        <input type="submit" name="update_book" value="Update Book">
    </form>
</body>
</html>