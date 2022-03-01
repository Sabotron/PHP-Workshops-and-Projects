<?php
include("functions.php");
if (isset($_GET['id'])) {
    $conn = connection();
    $id = $_GET['id'];
    $query = "SELECT * FROM category 
                  WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $name = $row['name'];
        $description = $row['description'];
    }
}
if (isset($_POST['update_category'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $query = "UPDATE category SET name = '$name', description = '$description' WHERE id = '$id'";
    mysqli_query($conn, $query);
    header("Location: index.php");
}
?>
<?php include("includes/header.php") ?>

<div class="container">
    <h1>Update Category</h1>
    <form action="edit_category.php?id=<?php echo $_GET['id']; ?>" method="POST" class="row g-3" role="form">
        <div class="col-auto">
            <input type="text" class="form-control" name="name" placeholder="Category's name" value="<?php echo $name; ?>">
        </div>
        <div class="col-auto">
            <textarea name="description" rows="2" class="form-control" placeholder="description"><?php echo $description; ?> </textarea>
        </div>
        <div class="col-auto">
            <input type="submit" class="btn btn-success" name="update_category" value="Update"></input>
        </div>
    </form>
</div>

<?php include("includes/footer.php") ?>