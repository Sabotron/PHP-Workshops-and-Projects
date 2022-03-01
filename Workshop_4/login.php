<?php require('functions.php'); ?>
<?php require('includes/header.php') ?>
<div class="container">
  <h1>New User</h1>
  <form action="functions.php" method="POST" class="row g-3" role="form">
    <div class="col-auto">
      <input type="text" class="form-control" name="nickname" placeholder="Nickname">
    </div>
    <div class="col-auto">
      <input type="text" class="form-control" name="password" placeholder="Password">
    </div>
    <div class="col-auto">
      <input type="submit" class="btn btn-success" name="login" value="Login"></input>
    </div>
  </form>
  <br>
  <div>
      <a href="index.php"> 
      <input type="button" class="btn btn-info" name="register" value="Register">
      </input>
      </a>
    </div>
</div>
<?php require('includes/footer.php ') ?>