<?php
session_start();

$conn = new mysqli("localhost", "root", "", "news_system");

$categories = $conn->query("SELECT * FROM categories");

if (isset($_POST['add'])) {

    $title = $_POST['title'];
    $category_id = $_POST['category_id'];
    $details = $_POST['details'];

    $user_id = $_SESSION['user_id'];

    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_name, "uploads/" . $image_name);

    $sql = "INSERT INTO news(title, category_id, details, image, user_id)
            VALUES('$title','$category_id','$details','$image_name','$user_id')";

    if ($conn->query($sql)) {
        echo "News Added Successfully";
    }
}
?>

<h2>Add News</h2>

<form method="POST" enctype="multipart/form-data">

    Title:
    <input type="text" name="title" required>

    <br><br>

    Category:
    <select name="category_id">

        <?php while($cat = $categories->fetch_assoc()) { ?>

            <option value="<?php echo $cat['id']; ?>">
                <?php echo $cat['name']; ?>
            </option>

        <?php } ?>

    </select>

    <br><br>

    Details:
    <textarea name="details"></textarea>

    <br><br>

    Image:
    <input type="file" name="image">

    <br><br>

    <button type="submit" name="add">
        Add News
    </button>

</form>

<br>

<a href="dashboard.php">Back To Dashboard</a>