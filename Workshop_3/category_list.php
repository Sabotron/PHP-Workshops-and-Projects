<div class="col-md-8">
  <h3>List of Categories</h3>
  <table class="table table-bordered">
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Actions</th>
    </tr>
    <tbody>
      <?php
      $query = "SELECT * FROM category";
      $result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_array($result)) { ?>
        <tr>
          <td>
            <?php echo $row['name'] ?>
          </td>
          <td>
            <?php echo $row['description'] ?>
          </td>
          <td>
            <a href="edit_category.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
              <i class="fas fa-marker"> </i>
            </a>
            <a href="delete_category.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
              <i class="fas fa-trash"></i>
            </a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>