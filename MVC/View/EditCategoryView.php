<?php

require_once("../Controller/CategoryController.php");
require_once("../Controller/ParentController.php");
AdminSession(); // verifica que el usuario sea de tipo administrador
$category = getCategory()->fetch(); // Solicita al controlador los datos de la categoría seleccionada
require_once("../Includes/head.php");

?>
<div class="container">
  <div class="row">
    <div class="col-lg-6 m-auto">
      <div class="card mt-5">
        <ul class="nav justify-content-end">
        <li class="nav-item">
            <p class="nav-link active" name=welcome > Usuari@: <?php echo $_SESSION['user']['name'] ?> </p>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="AdminView.php"> Administración </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="../index.php"> Logout </a>
          </li>
        </ul>
        <div class="card-header">
          <h2 class="card-title text-center"> Editar Categoría </h2>
          <br>
          <h4 class="card-subtitle"> Modificar Datos: </h4>
        </div>
        <div class="card-body">
          <form action="../Controller/CategoryController.php" method="POST">
            <input type="text" placeholder="Nombre de la Categoría" name="name" class="form-control mb-4" required="true" value= "<?php echo $category['name']?>">
            <input type="hidden" name="id" class="" required="false" value= "<?php echo $category['id']?>">
            
        </div>
        <div class="card-footer">
          <input type="submit" class="btn btn-success" name="UpdateCategory" value="Guardar Cambios"> </input>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!------------------------------------------------------------------------------------->

<?php require("../Includes/footer.php"); ?>