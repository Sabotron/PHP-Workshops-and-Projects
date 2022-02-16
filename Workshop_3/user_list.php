<div class="col-md-8">
  <h3>List of Users</h3>
  <table class="table table-bordered">
    <tr>
      <th>Nickname</th>
      <th>Name</th>
      <th>Lastname</th>
      <th>Actions</th>
    </tr>
    <tbody>
      <?php
      $query = "SELECT * FROM user";
      $result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_array($result)) { ?>
        <tr>
          <td>
            <?php echo $row['nickname'] ?>
          </td>
          <td>
            <?php echo $row['user_name'] ?>
          </td>
          <td>
            <?php echo $row['last_name'] ?>
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
</body>
</html>