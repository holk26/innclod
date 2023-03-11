<?php
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: view/login.php');
    exit();
    
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/css/app.css">
    <title>innclod</title>
</head>
<body>
        <div class="panel">
            <h1 class="text-center">Sistema de documentos</h1>
            <!-- contenido -->

           