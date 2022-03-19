<?php
require("functions.php");
$conn = connection();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM category 
                  WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $name = $row['name'];
    }
}


if (isset($_POST['updateCategory'])) {
    $id = $_GET['id'];    
    $name = $_POST['name'];
    $query = "UPDATE category SET name = '$name' WHERE id = '$id'";
    mysqli_query($conn, $query);
    header("Location: admin.php");
}


require("includes/header.php");
adminSession();
?>
<section class="admin">
  <h2>Editar Categoría</h2>
  <form action="editCategory.php?id=<?php echo $_GET['id']; ?>" method="POST" class="edit-form" role="form" name="editForm">
    <br>
    <div>
      <input type="text" placeholder="Nombre de la Categoría" name="name" class="shorttext" required="true" value="<?php echo $name; ?>">
    </div>
    <br>
    <div>
     <a href="admin.php"> <input type="button" class="btn-delete" name="cancel" value="Cancelar"></input></a>
      <input type="submit" class="btn-edit" name="updateCategory" value="Guardar"></input>
    </div>
    <br>
  </form>

</section>

<?php require("includes/footer.php"); ?>