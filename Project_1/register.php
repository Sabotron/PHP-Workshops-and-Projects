<?php 

    // Recibe información del usuario para crear una cuenta.
    require("includes/header.php");
    require("functions.php"); 
    errorHandler(); // functions.php
?>

<section class="register">
<nav>
    <ul>
        <li class="li-item"><a href="index.php" class="nav-link">Login</a></li>
    </ul>
</nav>

    <h1>Registro de Usuario</h1>
    <br>
    <div>
        <h2 class="message"><?php echo (errorHandler()); //functions.php ?></h2>
    </div>
    <form action="addUser.php" method="POST" class="register-form" role="form" name="registerForm">
        <div>
            <label for="info">Tipo de Usuario:</label>
            <input type="radio" name="userType" class="radiobutton" value="1" checked="true">Cliente</input>
            <input type="radio" name="userType" class="radiobutton" value="2">Admin</input>
        </div>
        <br>
        <div>
            <input type="text" placeholder="Nombre" name="name" class="shorttext" required="true" autocomplete="false">
            <input type="text" placeholder="Apellido" name="lastname" class="shorttext" required="true" autocomplete="false">
            <input type="text" placeholder="Teléfono" name="telephone" class="shorttext" required="true" autocomplete="false">
        </div>
        <br>
        <div>
            <input type="text" placeholder="Email" name="email" class="shorttext" required="true" autocomplete="false">
            <input type="text" placeholder="Password" name="password" class="shorttext" required="true" autocomplete="false">
            <input type="text" placeholder="Confirmar Password" name="passwordOk" class="shorttext" required="true" autocomplete="false">
        </div>
        <br>
        <div>
            <input type="text" placeholder="País" name="country" class="shorttext" required="true" autocomplete="false">
            <input type="text" placeholder="Ciudad" name="city" class="shorttext" required="true" autocomplete="false">
            <input type="text" placeholder="Código Postal" name="postalCode" class="shorttext" required="true" autocomplete="false">
        </div>
        <br>
        <div text-area>
            <textarea rows="2" cols="81" placeholder="Dirección 1" name="address1" class="longtext" required="true" autocomplete="false"></textarea>
        </div>
        <br>
        <div text-area>
            <textarea rows="2" cols="81" placeholder="Dirección 2" name="address2" class="longtext" autocomplete="false"></textarea>
        </div>
        <br>
        <div>
            <input type="submit" class="btn-submit" name="addUser" value="Registrar"></input>
        </div>
        <br>
    </form>
</section>
<?php require("includes/footer.php"); ?>