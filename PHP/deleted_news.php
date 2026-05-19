<?php
$conn = new mysqli("localhost", "root", "", "news_system");

$sql = "SELECT news.*, categories.name AS category_name
        FROM news
        LEFT JOIN categories
        ON news.category_id = categories.id
        WHERE news.deleted = 1";

$result = $conn->query($sql);
?>

<h2>Deleted News</h2>

<table border="1" cellpadding="10">

<tr>
    <th>Title</th>
    <th>Category</th>
    <th>Image</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>

<tr>

    <td><?php echo $row['title']; ?></td>

    <td><?php echo $row['category_name']; ?></td>

    <td>
        <img src="uploads/<?php echo $row['image']; ?>" width="100">
    </td>

</tr>

<?php } ?>

</table>

<br>

<a href="dashboard.php">Back To Dashboard</a>
