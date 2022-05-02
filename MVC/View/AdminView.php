<?php

require_once("../Controller/AdminController.php");
require_once("../Controller/ParentController.php");
require_once("../Controller/CategoryController.php");
adminSession(); // verifica que el usuario sea administrador
$categories = getCategories()->fetchAll(); // pide al controlador las categorías almacenadas en la base de datos
require_once("../Includes/head.php");
?>
<div class="container">
  <div class="row">
    <div class="col-lg-8 m-auto">
      <div class="card mt-5">
        <ul class="nav justify-content-end">
        <li class="nav-item">
            <p class="nav-link active" name=welcome > Bienvenid@ <?php echo $_SESSION['user']['name'] ?> </p>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="RegisterView.php"> Usuari@s </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="../Controller/ParentController.php?logout"> Logout </a>
          </li>
        </ul>
        <div class="card-header">
        <div>
            <?php echo errorHandler() // imprime un mensaje en caso de error?>
          </div>
          <h2 class="card-title text-center"> Administración </h2>
          <br>
          <h4 class="card-subtitle"> Agregar Categoría </h4>
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
    <div class="col-lg-8 m-auto">
      <div class="card mt-5">
        <div class="card-header">
          <h2 class="text-center"> Categorías Agregadas </h2>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <tr>
              <th> ID </th>
              <th> Categoría </th>
              <th> Acciones </th>
            </tr>
            <?php 
            foreach ($categories as $category) { ?>
              <tr>
                <td><?php echo $category['id'] ?></td>
                <td><?php echo $category['name'] ?></td>
                <td><a href="../View/EditCategoryView.php?id=<?php echo $category['id'] ?>" class="btn btn-success"> Editar </a>
                  <a href="../Controller/CategoryController.php?del=<?php echo $category['id'] ?>"   class="btn btn-danger"> Eliminar </a>
                </td>
              </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!------------------------------------------------------------------------------------->

<?php require("../Includes/footer.php"); ?>