<?php 
    require("includes/header.php");
    require("functions.php"); 
    clientSession();
?>
<section class="dashboard">
<nav>
    <ul>
        <li class="li-item"><a href="logout.php" class="nav-link">Logout</a></li>
    </ul>
</nav>
    <h1>Dashboard</h1>
    <div>
        <h2 class="welcome"><?php echo welcomeUser(); ?></h2>
    </div>
    <br>
    <h2>Agregar Fuente RSS</h2>
    <form action="addRSS.php" method="POST" class="dashboardr-form" role="form" name="dashboardForm">
        <br>
        <div>
            <input type="text" placeholder="Nombre de la Fuente" name="source" class="averagetext" required="true">
        </div>
        <br>
        <div class="category_select">
            <select name="categories" id="category"> 
            <?php
        $result = getCategory();
        while ($row = mysqli_fetch_array($result)) { 
            echo("<option value=".$row['id'].">".$row['name']."</option>");        
            }
            ?>
        </select>
        </div>
        <br>
        <div>
            <input type="text" placeholder="Link RSS" name="link-rss" class="averagetext" required="true">
        </div>
        <br>
        <div>
            <input type="submit" class="btn-addLink" name="addRss" value="Agregar Link"></input>
        </div>
        <br>
        <div class="category-table">
    <h3>Fuentes RSS</h3>
    <table class="source-table">
      <tr>
        <th>Nombre</th>
        <th>Categoría</th>
        <th>Acciones</th>
      </tr>
      <tbody>
        <?php
        $conn = connection();
        $query = "SELECT * FROM source WHERE userId =".$_SESSION['user']['id'];
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) { ?>
          <tr>
            <td>
              <?php echo $row['name'] ?>
            </td>
            <td>
              <a href="edit_category.php?id=<?php echo $row['id'] ?>" class="btn-edit">Editar</a>
              <a href="delete_category.php?id=<?php echo $row['id'] ?>" class="btn-delete">Borrar</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <br>
  </div>
    </form>
</section>
<?php require("includes/footer.php"); ?>