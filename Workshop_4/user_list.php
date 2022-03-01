<?php require('functions.php'); ?>
<?php require('includes/header.php') ?>

<div class="col-md-8">
  <h3>List of Users</h3>
  <table class="table table-bordered">
    <tr>
      <th>Name</th>
      <th>Lastname</th>
      <th>Nickname</th>
      <th>User Type</th>
      <th>Actions</th>
    </tr>
    <tbody>
      <?php
      $conn = connection();
      $query = "SELECT * FROM user";
      $result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_array($result)) { ?>
        <tr>
          <td>
            <?php echo $row['name'] ?>
          </td>
          <td>
            <?php echo $row['lastname'] ?>
          </td>
          <td>
            <?php echo $row['nickname'] ?>
          </td>
          <td>
            <?php echo $row['type'] ?>
          </td>
          <td>
            <a href="edit_user.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
              <i class="fas fa-marker"> </i>
            </a>
            <a href="delete_user.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
              <i class="fas fa-trash"></i>
            </a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<?php require('includes/footer.php ') ?>
