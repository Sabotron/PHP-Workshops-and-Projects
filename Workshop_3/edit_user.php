<?php
    include("db.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM user 
                  WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1 ){
            $row = mysqli_fetch_array($result);
            $nickname = $row['nickname'];
            $user_name = $row['user_name'];
            $last_name = $row['last_name'];
        }
    }

    if(isset($_POST['update_user'])){
        $id = $_GET['id'];
        $nickname = $_POST['nickname'];
        $user_name = $_POST['user_name'];
        $last_name = $_POST['last_name'];
        $query = "UPDATE user SET nickname = '$nickname', user_name = '$user_name', last_name = '$last_name' WHERE id = '$id'";
        mysqli_query($conn, $query);
        header("Location: index.php");
    }
?>

<?php include("includes/header.php") ?>

<div class="container">
  <h1>Update User</h1>
  <form action="edit_user.php?id=<?php echo $_GET['id']; ?>" method="POST" class="row g-3" role="form">
    <div class="col-auto">
      <input type="text" class="form-control" name="nickname" placeholder="Nickname" value="<?php echo $nickname; ?>">
     </div>
    <div class="col-auto">
      <input type="text" class="form-control" name="user_name" placeholder="User's name" value="<?php echo $user_name; ?>">
    </div>
    <div class="col-auto">
      <input type="text" class="form-control" name="last_name" placeholder="Last name" value="<?php echo $last_name; ?>">
    </div>
      <div class="col-auto">
        <input type="submit" class="btn btn-success" name="update_user" value="Update"></input>
      </div>
    </form>
</div>

<?php include("includes/footer.php")?>