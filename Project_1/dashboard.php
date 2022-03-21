<?php
require("includes/header.php");
require("functions.php");
clientSession(); // functions.php
?>
<!-- ------------------------------------------------------------------------------------------------------------------------------>
<section class="dashboard">
  <nav>
    <ul>
      <li class="li-item"><?php echo welcomeUser();// functions.php ?> </li>

      <li class="li-item"><a href="logout.php" class="nav-link">Logout</a></li>

      <li class="li-item"><a href="myFeed.php" class="nav-link">Mis Noticias</a></li>
    </ul>
  </nav>
  <h1>Dashboard</h1>

  <!-- Formulario para agregar fuentes de noticias -------------------------------------------------------------------------------->
  <form action="addSource.php" method="POST" class="dashboard" role="form" name="sourceForm"> 
    <h3>Agregar Fuente RSS</h3> <br>
    <div>
      <input type="text" placeholder="Nombre de la Fuente" name="name" class="averagetext" required="true">
    </div> <br>
    <div>
      <input type="text" placeholder="Link RSS" name="rss" class="averagetext" required="true">
    </div> <br>

    <div class="selector">
      <label for="selectorCategory">Seleccionar Categoría</label><br>
      <select name="category" id="categories">
        <?php
        $result = getCategory();// functions.php
        while ($rowCategory = mysqli_fetch_array($result)) {
          echo ("<option value=" . $rowCategory['id'] . ">" . $rowCategory['name'] . "</option>");
        }
        ?>
      </select><br>
      <br>
      <div>
      <input type="submit" class="btn-edit" name="addSource" value="Crear"></input>
    </div> 
<!-- División que muestra una tabla con las fuentes creadas por el usuario --------------------------------------------------------->
<div class="category-table">
    <h3>Feeds Guardados</h3>
    <table class="category-table">
      <tr>
        <th>Fuente</th>
        <th>Categoría</th>
        <th>Acciones</th>
      </tr>
      <tbody>
        <?php // Recorre las fuentes creadas del usuarui y las muestra con botones de editar/eliminar.
        $result = getSource();// functions.php
        while ($row = mysqli_fetch_array($result)) { ?>
          <tr>
            <td>
              <?php echo $row['source'] ?>
            </td>
            <td>
              <?php echo $row['category'] ?>
            </td>
            <td>
              <a href="editSource.php?id=<?php echo $row['id'] ?>" class="a-link"> 
                <input type="button" value="Editar" class="btn-edit"></input> 
              </a>
              <a href="deleteSource.php?id=<?php echo $row['id'] ?>" class="a-link">
                <input type="button" value="Eliminar" class="btn-delete"></input> 
              </a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
<br>
  </form> 
 
</section>
<br>
  <?php require("includes/footer.php"); ?>  