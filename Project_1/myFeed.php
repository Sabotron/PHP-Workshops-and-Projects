<?php
//Muestra en la página los botones con las categorías seleccionadas por el usuario, para buscar noticias de interés.
require("includes/header.php");
require("functions.php");
clientSession(); // Verifica que el usuario sea tipo "cliente"
?>
<!-- ------------------------------------------------------------------------------------------------------------------------------>
<section class="myFeeds">
  <nav>
    <ul>
      <li class="li-item"><?php echo welcomeUser(); //functions.php ?> </li> 
                         
      <li class="li-item"><a href="logout.php" class="nav-link">Logout</a></li>

      <li class="li-item"><a href="dashboard.php" class="nav-link">Dashboard</a></li>
    </ul>
  </nav>
  <h1>Mis Feeds</h1>
  <br>
  <!-------------------------------a-link------------------------------------------------------------------------------------------------->
  <h3>Categorías</h3>
 <div > 
        <?php
        $result = showCats();
        while ($row = mysqli_fetch_array($result)) { 
           echo '<input type="button" value="'.$row['name']. '" class="btn-edit" name='.$row['id']. '></input>';
         }
    ?>


  <!------------------------------------------------------------------------------------------------------------------------------ -->
  <hr>
  <div class="main-div">
<?php
    $result2 = userFeed();
    while ($row = mysqli_fetch_array($result2)) {
      if ($row['img'] == "none") {
        $img = "feed.png";
      } else {
        $img = $row['img'];
      }
    ?><div class="div-feed">
      <br>
        <img src="<?php echo ($img); ?> " alt="" width="25px" height="25px">
        <br>
        <a class=link-feed href="<?php echo $row['link']; ?> " target="_blank"> <?php echo $row['title']; ?>
       <p> "<?php echo $row['description'] ?> "</p>
      </a>
      </div>
    <?php
    }
    ?>
    </div>
  </div>
  <br>
</section>



<?php require("includes/footer.php"); ?>