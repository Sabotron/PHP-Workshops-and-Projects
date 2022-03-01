<?php require('functions.php'); ?>
<?php require('includes/header.php') ?>
<div class="container">
  <h1>New User</h1>
  <form action="functions.php" method="POST" class="row g-3" role="form">
    <div class="col-auto">
      <input type="text" class="form-control" name="name" placeholder="Name">
    </div>
    <div class="col-auto">
      <input type="text" class="form-control" name="lastname" placeholder="Lastname">
    </div>
    <div class="col-auto">
      <input type="text" class="form-control" name="nickname" placeholder="Nickname">
    </div>
    <div class="col-auto">
      <input type="text" class="form-control" name="password" placeholder="Password">
    </div>
    <div class="col-auto">
      <input type="radio" id="admin" name="userType" value="1" checked="true">Administrator</input>
    </div>
    <div class="col-auto">
      <input type="radio" id="student" name="userType" value="2">Student</input>
    </div>
    <div class="col-auto">
      <input type="submit" class="btn btn-success" name="save" value="Submit"></input>
    </div>
  </form>
</div>
<?php require('includes/footer.php ') ?>