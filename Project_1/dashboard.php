<?php require("includes/header.php"); ?>
<?php require("functions.php"); ?>
<section class="dashboard">
<nav>
    <ul>
        <li class="li-item"><a href="index.php" class="nav-link">Logout</a></li>
    </ul>
</nav>
    <h1>Dashboard</h1>
    <form action="functions.php" method="POST" class="register-form" role="form" name="registerForm">
        <br>
        <div>
            <input type="text" placeholder="Seleccionar Categoría" name="password" class="shorttext" required="true">
        </div>
        <div>
            <input type="text" placeholder="Link RSS" name="link-rss" class="shorttext" required="true">
        </div>
        <br>
        <div>
            <input type="submit" class="btn-login" name="addRss" value="Agregar RSS"></input>
        </div>
        <br>
    </form>
</section>
<?php require("includes/footer.php"); ?>