<?php
require("../Includes/head.php");
require("../Controller/AdminController.php");
require("../Controller/ParentController.php");
//
adminSession(); // functions.php
?>
<div class="container">
  <div class="row">
    <div class="col-lg-10 m-auto">
      <div class="card mt-5">
        <ul class="nav justify-content-end">
          <li class="nav-item">
            <a class="nav-link active" href="register.php">Bienvenido</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Mis Feeds</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Logout</a>
          </li>
        </ul>
        <div class="card-header">
          <h2 class="card-title">Administrador</h2>
          <br>
          <h4 class="card-subtitle">Agregar Categoría</h4>
        </div>
        <div class="card-body">
          <!-- Formulario para agregar categorías -------------------------------------------------------------------------------->
          <form action="../Controller/AdminController.php" method="POST">
            <input type="text" placeholder="Nombre de la Categoría" name="name" class="form-control mb-4" required="true">
        </div>
        <div class="card-footer">
          <input type="submit" class="btn btn-success" name="AddCategory" value="Agregar"> </input>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card mt-5">
        <div class="card-header">
          <h2 class="text-center"> Categorías Agregadas </h2>
        </div>
        <div class="card-body">
          <?php //  $db -> display_message(); 
          ?>
          <table class="table table-bordered">
            <tr>
              <th> ID </th>
              <th> Categoría </th>
              <th> Acciones </th>
            </tr>
            <?php // Recorre las fuentes creadas del usuarui y las muestra con botones de editar/eliminar.
            $categories = getCategories()->fetchAll(); // functions.php
            foreach ($categories as $category) { ?>
              <tr>
                <td><?php echo $category['id'] ?></td>
                <td><?php echo $category['name'] ?></td>
                <td><a href="../View/EditCategoryView.php?id=<?php echo $category['id'] ?>" class="btn btn-success"> Editar </a>
                  <a href="deleteCategory.php?id=<?php echo $category['id'] ?>" class="btn btn-danger"> Eliminar </a>
                </td>
              </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once("../Includes/footer.php"); ?>


