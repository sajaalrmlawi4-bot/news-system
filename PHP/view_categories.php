<?php
$conn = new mysqli("localhost", "root", "", "news_system");

$sql = "SELECT * FROM categories";

$result = $conn->query($sql);
?>

<h2>All Categories</h2>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Category Name</th>
    </tr>

<?php
while ($row = $result->fetch_assoc()) {
?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
</tr>

<?php
}
?>

</table>

<br>

<a href="dashboard.php">Back To Dashboard</a>