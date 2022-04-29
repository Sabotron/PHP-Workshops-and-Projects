<?php
require_once("../Controller/ParentController.php");
require_once("../Controller/DashboardController.php");
clientSession();
require_once("../Includes/head.php");
?>
<div class="container">
  <div class="row">
    <div class="col-lg-8 m-auto">
      <div class="card mt-5">
        <ul class="nav justify-content-end">
          <li class="nav-item">
            <p class="nav-link active" name=welcome >Bienvenido <?php echo $_SESSION['user']['name'] ?> </p>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="FeedView.php">Mis Feeds</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="../index.php">Logout</a>
          </li>
        </ul>
        <div class="card-header">
          <h2 class="card-title text-center">Dashboard</h2>
          <br>
          <h4 class="card-subtitle">Agregar RSS</h4>
        </div>
        <div class="card-body">
          <!-- Formulario para agregar fuentes de noticias -------------------------------------------------------------------------------->
          <form action="../Controller/DashboardController.php" method="POST">
            <input type="text" placeholder="Nombre de la Fuente" name="name" class="form-control mb-4" required="true">
            <input type="text" placeholder="Link RSS" name="rss" class="form-control mb-4" required="true">
            <h6>Categorías</h6>
            <select class="custom-select custom-select-sm" name="categoryId">
            <?php
              $categories = getCategories()->fetchAll();// functions.php
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
          <h2 class="text-center"> Feeds Agregados </h2>
        </div>
        <div class="card-body">
          <?php //  $db -> display_message(); 
          ?>
          <table class="table table-bordered">
            <tr>
              <th> Fuente </th>
              <th> Categoría </th>
              <th> Acciones </th>
            </tr>
            <?php // Recorre las fuentes creadas del usuario y las muestra con botones de editar/eliminar.
            $results = getSources()->fetchAll();
            foreach ($results as $result) { ?>
              <tr>
                <td><?php echo $result['source'] ?></td>
                <td><?php echo $result['category'] ?></td>
                <td><a href="EditRSSView.php?id=<?php echo $result['id'] ?>" class="btn btn-success"> Editar </a>
                  <a href="deleteSource.php?id=<?php echo $result['id'] ?>" class="btn btn-danger"> Eliminar </a>
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