<?php
require_once("../Controller/ParentController.php");
require_once("../Controller/FeedController.php");
clientSession(); // Verifica que el usuario sea tipo "cliente"
$feeds = searchFeeds()->fetchAll(); // pide al controlador los feeds como resultados de la búsqueda por palabra
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
            <a class="nav-link active" href="FeedView.php"> Mis Feeds </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="../index.php"> Logout </a>
          </li>
        </ul>
        <div class="card-header">
          <h2 class="card-title text-center"> Resultados de: " <?php echo $_POST['word'] ?> " </h2>
        </div>
        <div class="card-body">
          <div class="row row-cols-1 row-cols-3 ">
            <?php
            foreach ($feeds as $feed) {
              if ($feed['img'] == "none") {
                $img = "../Assets/img/feed.png";
              }
            ?>
              <div class="col mt-3">
                <div class="card h-100">
                  <img src="<?php $img; ?>" class="card-img-top" alt="img">
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