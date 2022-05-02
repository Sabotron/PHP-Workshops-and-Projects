<?php
require_once("../Controller/ParentController.php");
require_once("../Controller/DashboardController.php");            
clientSession(); // verifica que el usuario sea tipo cliente  
$categories = getCategories()->fetchAll();// solicita todas las categorías desde la base de datos            
$results = getSources()->fetchAll();// Recorre las fuentes creadas del usuario y las muestra con opciones de editar/eliminar.
require_once("../Includes/head.php");
?>
<div class="container">
  <div class="row">
    <div class="col-lg-8 m-auto">
      <div class="card mt-5">
        <ul class="nav justify-content-end">
          <li class="nav-item">
            <p class="nav-link active" name=welcome >Bienvenid@ <?php echo $_SESSION['user']['name'] ?> </p>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="FeedView.php"> Mis Feeds </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="../index.php"> Logout </a>
          </li>
        </ul>
        <div class="card-header">
        <div>
            <?php echo errorHandler(); //imprime mensaje en caso de error ?>
          </div>
          <h2 class="card-title text-center"> Dashboard </h2>
          <br>
          <h4 class="card-subtitle"> Agregar RSS </h4>
        </div>
        <div class="card-body">
            <form action="../Controller/DashboardController.php" method="POST">
            <input type="text" placeholder="Nombre de la Fuente" name="name" class="form-control mb-4" required="true">
            <input type="text" placeholder="Link RSS" name="rss" class="form-control mb-4" required="true">
            <h6>Categorías</h6>
            <select class="custom-select custom-select-sm" name="categoryId">
            <?php
               foreach($categories as $category)
              {
                  echo ("<option value=".$category['id'].">".$category['name']."</option>");
               }
            ?>
           </select>
        </div>
        <div class="card-footer">
          <input type="submit" class="btn btn-success" name="AddRss" value="Agregar RSS"> </input>
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
          <h2 class="text-center"> Fuentes Agregadas </h2>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <tr>
              <th> Fuente </th>
              <th> Categoría </th>
              <th> Acciones </th>
            </tr>
            <?php 
            foreach ($results as $result) { ?>
              <tr>
                <td><?php echo $result['source'] ?></td>
                <td><?php echo $result['category'] ?></td>
                <td><a href="EditRSSView.php?id=<?php echo $result['id'] ?>" class="btn btn-success"> Editar </a>
                  <a href="../Controller/DashboardController.php?del=<?php echo $result['id'] ?>" class="btn btn-danger"> Eliminar </a>
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