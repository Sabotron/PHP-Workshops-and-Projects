<?php 
    require("includes/header.php");
    require("functions.php"); 
    checkSession()
?>
<section class="dashboard">
<nav>
    <ul>
        <li class="li-item"><a href="logout.php" class="nav-link">Logout</a></li>
    </ul>
</nav>
    <h1>Dashboard</h1>
    <form action="addRSS.php" method="POST" class="dashboardr-form" role="form" name="dashboardForm">
        <br>
        <div>
            <input type="text" placeholder="Seleccionar Categoría" name="name" class="shorttext" required="true">
        </div>
        <div>
            <input type="text" placeholder="Link RSS" name="link-rss" class="shorttext" required="true">
        </div>
        <br>
        <div>
            <input type="submit" class="btn-addLink" name="addRss" value="Agregar Link"></input>
        </div>
        <br>
    </form>
</section>
<?php require("includes/footer.php"); ?>