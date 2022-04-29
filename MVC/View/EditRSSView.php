<?php
require("../Controller/ParentController.php");
require("../Controller/DashboardController.php");
clientSession();
$rss = getSource()->fetch();
require_once("../Includes/head.php");
?>
<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card mt-5">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <p class="nav-link active" name=welcome>Usuario: <?php echo $_SESSION['user']['name'] ?> </p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="FeedView.php">Mis Feeds</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../index.php">Logout</a>
                    </li>
                </ul>
                <div class="card-header">
                    <h2 class="card-title text-center"> Editar Fuente RSS </h2>
                    <br>
                    <h4 class="card-subtitle"> Modificar Datos: </h4>
                </div>
                <div class="card-body">
                    <form action="../Controller/DashboardController.php" method="POST">

                        <input type="hidden" name="id" class="" required="false" value="<?php echo $rss['id']; ?>">
                        <input type="text" placeholder="Nombre de la Fuente" name="name" class="form-control mb-4" required="true" value="<?php echo $rss['name']; ?>">
                        <input type=" text" placeholder="Link RSS" name="rss" class="form-control mb-4" required="true" value="<?php echo $rss['rss']; ?>">
                        <h6> Categorías </h6>
                        <select class=" custom-select custom-select-sm" name="categoryId">
                            <?php
                            $categories = getCategories()->fetchAll(); // functions.php
                            foreach ($categories as $category) {
                                if ($category['id'] == $rss['categoryId']) //Compara el ID de la categoría a editar y la muestra por default en el "<select>"
                                {
                                    echo ("<option selected='selected' value=" . $category['id'] . ">" . $category['name'] . "</option>");
                                } else {
                                    echo ("<option value=" . $category['id'] . ">" . $category['name'] . "</option>");
                                }
                            }
                            ?>
                        </select>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-success" name="updtRss" value="Guardar Cambios"> </input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!------------------------------------------------------------------------------------->

<?php require("../Includes/footer.php"); ?>