<?php

require("functions.php");
adminSession();

require("includes/header.php");
?>

<section class="admin">
  <nav>
    <ul>
      <li class="li-item"><a href="logout.php" class="nav-link">Logout</a></li>
    </ul>
  </nav>
  <h1>Administración</h1>
  <div>
    <h2 class="welcome"><?php echo welcomeUser(); ?></h2>
  </div>
  <br>
  <h2>Agregar Categoría</h2>
  <form action="addCategory.php" method="POST" class="admin-form" role="form" name="adminForm">
    <br>
    <div>
      <input type="text" placeholder="Nombre de la Categoría" name="name" class="averagetext" required="true">
    </div>
    <br>
    <div>
      <input type="submit" class="btn-add" name="addCategory" value="Agregar"></input>
    </div>
    <br>
  </form>
  <div class="category-table">
    <h3>Categorías</h3>
    <table class="category-table">
      <tr>
        <th>Categoría</th>
        <th>Acciones</th>
      </tr>
      <tbody>
        <?php
        $result = getCategory();
        while ($row = mysqli_fetch_array($result)) { ?>
          <tr>
            <td>
              <?php echo $row['name']?>
            </td>
            <td>
              <a href="editCategory.php?id=<?php echo $row['id'] ?>" class="a-link"> <input type="button" value="Editar" class="btn-edit"></input> </a>

              <a href="deleteCategory.php?id=<?php echo $row['id'] ?>" class="a-link"><input type="button" value="Eliminar" class="btn-delete"></input> </a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <br>
  </div>

</section>



<?php require("includes/footer.php"); ?>