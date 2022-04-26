<?php
require_once("../Includes/head.php");
require_once("../Controller/CategoryController.php");
require_once("../Controller/ParentController.php");
$category = getCategory()->fetch();
clientSession();
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
          <h4 class="card-subtitle">Editar Categoría</h4>
        </div>
        <div class="card-body">
          <!-- Formulario para agregar categorías -------------------------------------------------------------------------------->
          <form action="../Controller/CategoryController.php" method="POST">
            <input type="text" placeholder="Nombre de la Categoría" name="name" class="form-control mb-4" required="true" value= "<?php echo $category['name']?>">
            <input type="hidden" name="id" class="" required="false" value= "<?php echo $category['id']?>">
            
        </div>
        <div class="card-footer">
          <input type="submit" class="btn btn-success" name="UpdateCategory" value="Editar"> </input>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>