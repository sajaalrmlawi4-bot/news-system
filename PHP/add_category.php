<?php
$conn = new mysqli("localhost", "root", "", "news_system");

if (isset($_POST['add'])) {

    $name = $_POST['name'];

    $sql = "INSERT INTO categories(name) VALUES('$name')";

    if ($conn->query($sql)) {
        echo "Category Added Successfully";
    }
}
?>

<h2>Add Category</h2>

<form method="POST">

    Category Name:
    <input type="text" name="name" required>

    <br><br>

    <button type="submit" name="add">
        Add Category
    </button>

</form>

<br>

<a href="dashboard.php">Back To Dashboard</a>