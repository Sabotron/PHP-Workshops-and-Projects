<?php require('db.php') ?>
<?php require('includes/header.php') ?>
<div class="container">
  <h1>Add New User</h1>
  <form action="save.php" method="POST" class="row g-3" role="form">
    <div class="col-auto">
      <input type="text" class="form-control" name="nickname" placeholder="Nickname">
    </div>
    <div class="col-auto">
      <input type="text" class="form-control" name="user_name" placeholder="User's name">
    </div>
    <div class="col-auto">
      <input type="text" class="form-control" name="last_name" placeholder="Last name">
    </div>
    <h2> Add New Category</h2>
    <form action="save.php" method="POST" class="row g-3" role="form">
      <div class="col-auto">
        <input type="text" class="form-control" name="category" placeholder="Category's name">
      </div>
      <div class="col-auto">
      <textarea name="description" rows="2" class="form-control" placeholder="description"></textarea>
      </div>
      <div class="col-auto">
        <input type="submit" class="btn btn-success" name="save" value="Submit"></input>
      </div>
      <?php require('user_list.php') ?>
      <?php require('category_list.php') ?>

    </form>

</div>
<?php require('includes/footer.php ') ?>