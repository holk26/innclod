<?php
require_once("config.php");
require_once("controllers/index.php");
if(isset($_GET['m'])) {
    $metodo = $_GET['m'];
    if(method_exists('modelControllers', $metodo)) {
        call_user_func(array('modelControllers', $metodo));
    } else {
        modelControllers::getIndex();
    }
} else {
    modelControllers::getIndex();
}