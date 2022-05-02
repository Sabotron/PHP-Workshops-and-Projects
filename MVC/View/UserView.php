<?php
require_once("../Controller/ParentController.php");
require_once("../Controller/UserController.php");
require_once("../Includes/head.php");
?>

<div class="container">
  <div class="row">
    <div class="col-lg-10 m-auto">
      <div class="card mt-5">
        <ul class="nav justify-content-end">
          <li class="nav-item">
            <a class="nav-link active" href="../Controller/ParentController.php?logout"> Login </a>
          </li>
        </ul>
        <div class="card-header">
          <div>
            <?php echo errorHandler();  // función que retorna mensaje en caso de error ?> 
          </div>
          <h2 class="card-title text-center"> Registrar Usuari@ </h2>
          <br>
          <h4 class="card-subtitle"> Ingresar Información </h4>
        </div>
        <div class="card-body">
          <form action="../Controller/UserController.php" method="POST">
            <div class="form-check form-check-inline">
              <label class="form-check-label" for="inlineRadio1"> Tipo de cuenta: </label>
            </div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="1" checked="true">
              <label class="form-check-label" for="inlineRadio1"> Usuari@ </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="2">
              <label class="form-check-label" for="inlineRadio1"> Admin </label>
            </div>

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
              <textarea class="form-control" placeholder="Dirección 1" id="mensaje" rows="3" name="address1"></textarea>
            </div>
            <div class="form-group green-border-focus">
              <textarea class="form-control" placeholder="Dirección 2" id="mensaje" rows="3" name="address2"></textarea>
            </div>
        </div>
        <div class="card-footer">
          <input type="submit" class="btn btn-success" name="AddUser" value="Registrar"> </input>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!------------------------------------------------------------------------------------->

<?php require("../Includes/footer.php"); ?>