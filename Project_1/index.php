<?php require("includes/header.php"); ?>
<?php require("functions.php"); ?>
<section class="register">
<nav>
    <ul>
        <li class="li-item"><a href="login.php" class="nav-link">Login</a></li>
    </ul>
</nav>

    <h1>Registro de Usuario</h1>
    <br>
    <form action="functions.php" method="POST" class="register-form" role="form" name="registerForm">
        <div>
            <label for="">Tipo de Usuario:</label>
            <input type="radio" name="userType" class="radiobutton" value="1" checked="true">Cliente</input>
            <input type="radio" name="userType" class="radiobutton" value="2">Admin</input>
        </div>
        <br>
        <div>
            <input type="text" placeholder="Nombre" name="name" class="shorttext" required="true">
            <input type="text" placeholder="Apellido" name="lastname" class="shorttext" required="true">
            <input type="text" placeholder="Teléfono" name="telephone" class="shorttext" required="true">
        </div>
        <br>
        <div>
            <input type="text" placeholder="Email" name="email" class="shorttext" required="true">
            <input type="text" placeholder="Password" name="password" class="shorttext" required="true">
            <input type="text" placeholder="Confirmar Password" name="passwordOk" class="shorttext" required="true">
        </div>
        <br>
        <div>
            <input type="text" placeholder="País" name="country" class="shorttext" required="true">
            <input type="text" placeholder="Ciudad" name="city" class="shorttext" required="true">
            <input type="text" placeholder="Código Postal" name="postalCode" class="shorttext" required="true">
        </div>

        <br>
        <div text-area>
            <textarea rows="2" cols="81" placeholder="Dirección 1" name="address1" class="longtext" required="true"></textarea>
        </div>
        <br>
        <div text-area>
            <textarea rows="2" cols="81" placeholder="Dirección 2" name="address2" class="longtext"></textarea>
        </div>
        <br>
        <div>
            <input type="submit" class="btn-submit" name="save" value="Guardar"></input>
        </div>
        <br>
    </form>
</section>
<?php require("includes/footer.php"); ?>