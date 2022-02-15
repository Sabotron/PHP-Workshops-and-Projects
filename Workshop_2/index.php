<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<?php
  include('functions.php');
  include('db.php');
  $provinces = getProvinces();
?>
<body>
    <div class="container">
    <div class="jumbotron">
      <h1 class="display-4">Signup</h1>
      <p class="lead">This is the signup process</p>
      <hr class="my-4">
    </div>
    <form method="POST" action="save.php">
      <div class="form-group">
        <label for="first-name">First Name</label>
        <input id="first-name" class="form-control" type="text" name="name">
      </div>
      <div class="form-group">
        <label for="last-name">Last Name</label>
        <input id="last-name" class="form-control" type="text" name="lastn">
      </div>
      <div class="form-group">
        <label for="email">Email Address</label>
        <input id="email" class="form-control" type="text" name="email">
      </div>
      <div class="form-group">
        <label for="province">Provincia</label>
        <select id="province" class="form-control" name="province">
          <?php
          foreach($provinces as $province) {
            echo "<option>$province</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input id="password" class="form-control" type="password" name="passw">
      </div>
      <button type="submit" class="btn btn-primary" name="sign">Sign Up</button>
        </br>
      <div class="form-group p-4">
      <div class="jumbotron">
      <h1 class="display-4">Registered Users</h1>
      <hr class="my-4">
    </div>
      <div class="form-group">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Province</th>
                    <th>Date Accessed</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                        $query = "SELECT * FROM user";
                        $result_item = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result_item)) { ?>
                            <tr>
                                <td>
                                    <?php echo $row['name'] ?>
                                </td>
                                <td>
                                    <?php echo $row['last_name'] ?>
                                </td>
                                <td>
                                    <?php echo $row['email'] ?>
                                </td>
                                <td>
                                    <?php echo $row['province'] ?>
                                </td>
                                <td>
                                    <?php echo $row['date'] ?>
                                </td>
                            </tr>
                    <?php } ?>
            </tbody>
        </table>
    </div>
     </div>
    </form>
  </div>

</body>
</html>