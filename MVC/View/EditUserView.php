<?php
require_once("../Controller/ParentController.php");
require_once("../Controller/UserController.php");
adminSession();
errorHandler();
$user = getUser()->fetch();
require_once("../Includes/head.php");
?>
<div class="container">
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card mt-5">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <p class="nav-link active" name=welcome>Usuario: <?php echo $_SESSION['user']['name'] ?> </p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../View/AdminView.php">Administración</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../View/RegisterView.php">Usuarios</a>
                    </li>
                </ul>
                <div class="card-header">
                    <h2 class="card-title text-center"> Editar Usuario </h2>
                    <br>
                    <h4 class="card-subtitle"> Modificar Información: </h4>
                </div>
                <div class="card-body">
                    <form action="../Controller/UserController.php" method="POST">
                        <input type="hidden" name="id" class="" required="false" value="<?php echo $user['id']; ?>">
                        <input type="text" placeholder="Nombre " name="name" class="form-control mb-4" required="true" value="<?php echo $user['name'] ?>">
                        <input type="text" placeholder="Apellido" name="lastname" class="form-control mb-4" required="true" value="<?php echo $user['lastname'] ?>">
                        <input type="text" placeholder="Telefono " name="telephone" class="form-control mb-4" required="true" value="<?php echo $user['telephone'] ?>">
                        <input type="Email" placeholder="Email" name="email" class="form-control mb-4" required="true" value="<?php echo $user['email'] ?>">
                        <input type="password" placeholder="Password " name="password" class="form-control mb-4" required="true" value="<?php echo $user['password'] ?>">
                        <input type="password" placeholder="Confirmar Password" name="confirm" class="form-control mb-4" required="true" value="<?php echo $user['password'] ?>">
                        <input type="text" placeholder="País " name="country" class="form-control mb-4" required="true" value="<?php echo $user['country'] ?>">
                        <input type="text" placeholder="Ciudad" name="city" class="form-control mb-4" required="true" value="<?php echo $user['city'] ?>">
                        <input type="text" placeholder="Código Postal" name="postalCode" class="form-control mb-4" required="true" value="<?php echo $user['postalCode'] ?>">
                        <div class="form-group green-border-focus">
                            <textarea class="form-control" placeholder="Dirección 1" id="add1" rows="2" name="address1"><?php echo $user['address1'] ?></textarea>
                        </div>
                        <div class="form-group green-border-focus">
                            <textarea class="form-control" placeholder="Dirección 2" id="add2" rows="2" name="address2"><?php echo $user['address2'] ?></textarea>
                        </div>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-success" name="UpdateUser" value="Guardar Cambios"> </input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------------------------------------------------------------------->
<?php require_once("../Includes/footer.php"); ?>