<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "news_system");
?>

<!DOCTYPE html>
<html>

<head>

    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

<h2 class="mb-4">
    Welcome <?php echo $_SESSION['user_name']; ?>
</h2>

<div class="mb-4">

    <a class="btn btn-primary" href="add_category.php">
        Add Category
    </a>

    <a class="btn btn-success" href="view_categories.php">
        View Categories
    </a>

    <a class="btn btn-warning" href="add_news.php">
        Add News
    </a>

    <a class="btn btn-danger" href="deleted_news.php">
        Deleted News
    </a>

    <a class="btn btn-dark" href="logout.php">
        Logout
    </a>

</div>

<h3>All News</h3>

<table class="table table-bordered table-striped">

<tr>
    <th>Title</th>
    <th>Category</th>
    <th>Image</th>
    <th>Actions</th>
</tr>

<?php

$sql = "SELECT news.*, categories.name AS category_name
        FROM news
        LEFT JOIN categories
        ON news.category_id = categories.id
        WHERE news.deleted = 0";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {

?>

<tr>

    <td><?php echo $row['title']; ?></td>

    <td><?php echo $row['category_name']; ?></td>

    <td>
        <img src="uploads/<?php echo $row['image']; ?>" width="100">
    </td>

    <td>

        <a class="btn btn-sm btn-warning"
           href="edit_news.php?id=<?php echo $row['id']; ?>">
           Edit
        </a>

        <a class="btn btn-sm btn-danger"
           href="delete_news.php?id=<?php echo $row['id']; ?>">
           Delete
        </a>

    </td>

</tr>

<?php } ?>

</table>

</body>
</html>