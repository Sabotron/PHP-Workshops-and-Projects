<?php
require_once("../Controller/ParentController.php");
require_once("../Controller/UserController.php");
require_once("../Includes/head.php");
adminSession();  // Recibe información del usuario para crear una cuenta.
errorHandler(); // functions.php
?>
<div class="container">
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card mt-5">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active" href="../View/AdminView.php">Administración</a>
                    </li>
                </ul>
                <div class="card-header">
                    <h2 class="card-title">Editar Usuario</h2>
                    <br>
                    <h4 class="card-subtitle">Modificar Información</h4>
                </div>
                <div class="card-body">
                    <form action="../Controller/RegisterController.php" method="POST">
                        <input type="text" placeholder="Nombre " name="name" class="form-control mb-4" required="true">
                        <input type="text" placeholder="Apellido" name="lastname" class="form-control mb-4" required="true">
                        <input type="text" placeholder="Telefono " name="telephone" class="form-control mb-4" required="true">
                        <input type="Email" placeholder="Email" name="email" class="form-control mb-4" required="true">
                        <input type="password" placeholder="Password " name="password" class="form-control mb-4" required="true">
                        <input type="password" placeholder="Confirmar Password" name="confirm" class="form-control mb-4" required="true">
                        <input type="text" placeholder="País " name="country" class="form-control mb-4" required="true">
                        <input type="text" placeholder="Ciudad" name="city" class="form-control mb-4" required="true">
                        <input type="text" placeholder="Código Postal" name="postalCode" class="form-control mb-4" required="true">
                        <div class="form-group green-border-focus">
                            <textarea class="form-control" placeholder="Dirección 1" id="add1" rows="2" name="address1"></textarea>
                        </div>
                        <div class="form-group green-border-focus">
                            <textarea class="form-control" placeholder="Dirección 2" id="add2" rows="2" name="address2"></textarea>
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