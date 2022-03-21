<?php
    require("includes/header.php");
    require("functions.php");
// Elimina las sesiones existentes si entran por otro enlace, como medida de seguridad.
session_start();
session_destroy();
?>
 <!-- ------------------------------------------------------------------------------------------------------------------------------>
<section class="login">
    <nav>
        <ul>
            <li class="li-item"><a href="register.php" class="nav-link">Registrarse</a></li>
        </ul>
    </nav>    
    <div>
        <h2 class="message"><?php echo (errorHandler()) //functions.php ?></h2>
    </div>
 <!-- ------------------------------------------------------------------------------------------------------------------------------>    
    <h1>Iniciar Sesión</h1>
    <form action="checkUser.php" method="POST" class="login-form" role="form" name="loginForm">
        
        <div>
            <input type="text" placeholder="Email" name="email" class="shorttext-login" required="true">
            <input type="text" placeholder="Password" name="password" class="shorttext-login" required="true">
        </div>
        <br>
 <!-- ------------------------------------------------------------------------------------------------------------------------------>        
        <div>
            <input type="submit" class="btn-login" name="login" value="Login"></input>
        </div>
        <br>
    </form>
  <!-- ------------------------------------------------------------------------------------------------------------------------------>   
</section>
<?php require("includes/footer.php"); ?>