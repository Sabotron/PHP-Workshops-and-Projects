<?php
// página que muestra los atributos de una fuente para los usuarios tipo cliente puedan editarlos.
require("functions.php");
$conn = connection(); // functions.php

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM source
                  WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $id = $row['id'];
    $name = $row['name'];
    $rss = $row['rss'];
    $categoryId = $row['categoryId'];
  }
}

if (isset($_POST['updateSource'])) {
  $id = $_GET['id'];
  $name = $_POST['name'];
  $categoryId = $POST['categoryId'];
  $rss = $POST['rss'];
  $query = "UPDATE category 
                SET name = '$name', categoryId = '$categoryId', rss = '$rss' 
                WHERE id = '$id'";
  mysqli_query($conn, $query);
  header("Location: dashboard.php");
}


require("includes/header.php");
clientSession(); // functions.php
?>
<section class="admin">
  <h2>Editar Fuente</h2>
  <form action="editSource.php?id=<?php echo $_GET['id']; ?>" method="POST" class="edit-form" role="form" name="editForm">
    <br>
    <div>
      <input type="text" placeholder="Nombre de la Fuente" name="name" class="averagetext" required="true" value="<?php echo $name; ?>">
    </div>
    <br>
    <div>
      <input type="text" placeholder="Link RSS" name="rss" class="averagetext" required="true" value="<?php echo $rss; ?>">
    </div> <br>

    <div class="selector">
      <label for="selectorCategory">Seleccionar Categoría</label><br>
      <select name="category" id="categories" default="<?php echo $categoryId; ?>">
        <?php // Recorre las categorías de la DB 
        $result = getCategory(); // functions.php
        while ($rowCategory = mysqli_fetch_array($result)) {
          if ($rowCategory['id'] == $categoryId) //Compara el ID de la categoría a editar y la muestra por default en el "<select>"
          {
            echo ("<option selected='selected' value=" . $rowCategory['id'] . ">" . $rowCategory['name'] . "</option>");
          } else {
            echo ("<option value=" . $rowCategory['id'] . ">" . $rowCategory['name'] . "</option>");
          }
        }
        ?>
      </select><br>
      <br>
      <div>
        <a href="dashboard.php"> <input type="button" class="btn-delete" name="cancel" value="Cancelar"></input></a>
        <input type="submit" class="btn-edit" name="updateSource" value="Guardar"></input>
      </div>
      <br>
  </form>

</section>

<?php require("includes/footer.php"); ?>