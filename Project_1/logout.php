<?php
//Elimina los cookies de la sesión y redirecciona al Login (index.php).
session_start();
session_destroy();
header('Location: index.php');
