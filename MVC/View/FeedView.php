<?php
//Muestra en la página los botones con las categorías seleccionadas por el usuario, para buscar noticias de interés.
require_once("../Controller/ParentController.php");
require_once("../Controller/FeedController.php");
require_once("../Controller/CategoryController.php");
clientSession(); // Verifica que el usuario sea tipo "cliente"            
$categories = UserCategories(); //pide al controlador las categorías del usuario            
$feeds = getFeeds()->fetchAll();  //solicita los feeds correspondientes al usuario
require_once("../Includes/head.php");
?>
<div class="container">
  <div class="row">
    <div class="col-lg-10 m-auto">
      <div class="card mt-5">
        <ul class="nav justify-content-end">
          <li class="nav-item">
            <p class="nav-link active" name=welcome> Usuari@: <?php echo $_SESSION['user']['name'] ?> </p>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="DashboardView.php"> Dashboard </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="../index.php"> Logout </a>
          </li>
        </ul>
        <div class="card-header">
          <h2 class="card-title text-center"> Mis Feeds </h2>
        </div>
        <div class="card-body">
          <div class="text-center">
            <h4> Categorías </h4>
            <?php

            foreach ($categories as $category) { // las recorre y genera un link para filtrar la búsqueda de cada una
            ?>
              <a href="../View/FeedFilterView.php?filter=<?php echo $category['id'] ?>" class="btn btn-light"><?php echo $category['name'] ?></a>
            <?php  } ?>
          </div>
          <!-- el form es para buscar los feeds que contengan los mismos caracteres solicitados por el usuario-->
          <div class="d-flex justify-content-center mt-3">
            <form class="form-inline my-2 my-lg-0" action="FeedSearchView.php" method="POST">
              <input class="form-control mr-sm-2" type="text" placeholder="Filtrar por palabra" name="word">
              <button class="btn btn-outline-info my-2 my-sm-0" type="submit" name="find"> Buscar </button>
            </form>
          </div>
          <hr>
          <div class="row row-cols-1 row-cols-3 ">
            <?php

            foreach ($feeds as $feed) {
              if ($feed['img'] == "none") {
                $img = "../Assets/img/feed.png";
              }
            ?>
              <div class="col mt-3">
                <div class="card h-100">
                  <img src="<?php echo $img; ?>" class="card-img-top" alt="img">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $feed['title']; ?></h5>

                    <a href="<?php echo $feed['link']; ?>" target="_Blank" class="card-text"><?php echo $feed['description'] ?></a>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
        <div class="card-footer">
        </div>
      </div>
    </div>
  </div>
</div>
<!------------------------------------------------------------------------------------->

<?php require("../Includes/footer.php"); ?>