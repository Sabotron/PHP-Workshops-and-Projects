<?php require("includes/header.php"); ?>
<?php require("functions.php"); ?>

<section class="admin">
<nav>
    <ul>
        <li class="li-item"><a href="index.php" class="nav-link">Logout</a></li>
    </ul>
</nav>
    <h1>Administración</h1>
    <form action="functions.php" method="POST" class="admin-form" role="form" name="adminForm">
        <br>
        <div>
            <input type="text" placeholder="Agregar Categoría" name="name" class="shorttext" required="true">
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
    <tbody >
      <?php
      $conn = connection();
      $query = "SELECT * FROM category";
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

</section>



<?php require("includes/footer.php"); ?>