<?php

$conn = new mysqli("localhost", "root", "", "news_system");

$id = $_GET['id'];

// جلب الخبر القديم
$sql = "SELECT * FROM news WHERE id=$id";
$result = $conn->query($sql);
$news = $result->fetch_assoc();

// جلب الفئات
$categories = $conn->query("SELECT * FROM categories");

// تحديث البيانات
if (isset($_POST['update'])) {

    $title = $_POST['title'];
    $category_id = $_POST['category_id'];
    $details = $_POST['details'];

    $sql = "UPDATE news 
            SET title='$title', category_id='$category_id', details='$details'
            WHERE id=$id";

    $conn->query($sql);

    header("Location: dashboard.php");
}
?>

<h2>Edit News</h2>

<form method="POST">

Title:
<input type="text" name="title" value="<?php echo $news['title']; ?>" required>
<br><br>

Category:
<select name="category_id">

<?php while($cat = $categories->fetch_assoc()) { ?>
    <option value="<?php echo $cat['id']; ?>"
        <?php if($cat['id'] == $news['category_id']) echo "selected"; ?>>
        <?php echo $cat['name']; ?>
    </option>
<?php } ?>

</select>

<br><br>

Details:
<textarea name="details"><?php echo $news['details']; ?></textarea>

<br><br>

<button type="submit" name="update">Update</button>

</form>

<br>

<a href="dashboard.php">Back</a>