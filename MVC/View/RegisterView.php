<?php
require_once("../Controller/ParentController.php");
require_once("../Controller/UserController.php");
 $users = getUsers()->fetchAll(); // recorre todos los usuarios almacenados en la base de datos
adminSession(); // verifica que el usuario sea administrador

require_once("../Includes/head.php");
?>
<div class="container">
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card mt-5">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <p class="nav-link active" name=welcome>Usuari@: <?php echo $_SESSION['user']['name'] ?> </p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="AdminView.php">Administración</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../index.php">Logout</a>
                    </li>
                </ul>
                <div class="card-header">
                    <div>
                    <?php echo errorHandler();  // función que retorna mensaje en caso de error ?> 
                    </div>
                    <h2 class="card-tittle text-center"> Usuari@s Registrad@s </h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th> ID </th>
                            <th> Nombre </th>
                            <th> Apellido </th>
                            <th> Teléfono </th>
                            <th> Email </th>
                            <th> Password </th>
                            <th> Acciones </th>
                        </tr>
                        <?php // Recorre los usuarios y las muestra con botones para editar/eliminar.                     
                        foreach ($users as $user) { ?>
                            <tr>
                                <td><?php echo $user['id'] ?></td>
                                <td><?php echo $user['name'] ?></td>
                                <td><?php echo $user['lastname'] ?></td>
                                <td><?php echo $user['telephone'] ?></td>
                                <td><?php echo $user['email'] ?></td>
                                <td><?php echo $user['password'] ?></td>
                                <td><a href="../View/EditUserView.php?id=<?php echo $user['id'] ?>" class="btn btn-success"> Editar </a>
                                    <a href="../Controller/UserController.php?del=<?php echo $user['id'] ?>" class="btn btn-danger"> Eliminar </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!------------------------------------------------------------------------------------->

<?php require("../Includes/footer.php"); ?>