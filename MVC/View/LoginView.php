<?php
require_once("../Controller/ParentController.php");
require_once("../Controller/LoginController.php");
// Elimina las sesiones existentes si entran por otro enlace, como medida de seguridad.
session_start();
session_unset();
session_destroy();
require_once("../Includes/head.php");
?>

<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card mt-5">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active" href="UserView.php"> Registrarse </a>
                    </li>
                </ul>
                <div class="card-header">
                    <h2 class="card-tittle text-center"> Iniciar Sesión </h2>
                </div>
                <div class="card-body">
                    <form action="../Controller/LoginController.php" method="POST">
                        <input type="text" placeholder="Email" name="email" class="form-control mb-2" required="true">
                        <input type="text" placeholder="Password" name="password" class="form-control mb-2" required="true">
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-success" name="Login" value="Login"> </input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once("../Includes/footer.php"); ?>