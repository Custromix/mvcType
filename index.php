<?php

/* Constante de la page index.php par défaut */
$server = isset($_SERVER['HTTPS']) ? "https" : "http";
define('URL', str_replace("index.php", "", ($server."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]")));

/* Pour définir un chemin pour revenir à l'index faire dans la view : <?php echo URL; ?> */
require_once('controllers/Router.php');
$router = new Router();


echo $router->routeRequest();


