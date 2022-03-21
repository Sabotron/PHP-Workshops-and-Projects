<?php
//Muestra en la página los botones con las categorías seleccionadas por el usuario, para buscar noticias de interés.
require("includes/header.php");
require("functions.php");
clientSession();// Verifica que el usuario sea tipo "cliente"

// PENDIENTE!!!!!!!!!!
?>
<!-- ------------------------------------------------------------------------------------------------------------------------------>
<section class="dashboard">   
  <nav>
    <ul>
      <li class="li-item"><?php echo welcomeUser();//functions.php ?> </li>

      <li class="li-item"><a href="logout.php" class="nav-link">Logout</a></li>

      <li class="li-item"><a href="dashboard.php" class="nav-link">Dashboard</a></li>
    </ul>
  </nav>
  <h1>Mis Noticias</h1>

  <!-- ------------------------------------------------------------------------------------------------------------------------------>

    <div> 
        <?php
        $result = showCats();
        while ($row = mysqli_fetch_array($result)) { 
           echo '<input type="button" value="'.$row['name']. '" class="btn-edit" name='.$row['id'].'></input>';
         }
    ?>
    </div> 
    </div>
</section>
<br>


  <?php require("includes/footer.php"); ?>  
