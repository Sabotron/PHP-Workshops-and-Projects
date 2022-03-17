<?php require("includes/header.php"); ?>
<?php require("functions.php"); ?>

<section class="login">
<nav>
    <ul>
        <li class="li-item"><a href="index.php" class="nav-link">Registrarse</a></li>
    </ul>
</nav>
    <h1>Iniciar Sesión</h1>
    <form action="functions.php" method="POST" class="register-form" role="form" name="registerForm">
        <br>
        <div>
            <input type="text" placeholder="Email" name="email" class="shorttext-login" required="true">
            <input type="text" placeholder="Password" name="password" class="shorttext-login" required="true">
        </div>
        <br>
        <div>
            <input type="submit" class="btn-login" name="login" value="Login"></input>
        </div>
        <br>
    </form>
</section>
<?php require("includes/footer.php"); ?>