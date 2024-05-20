<?php
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);

    include "General/database.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <title>ONG Abrigo Amigo Fiel</title>
        <link rel="stylesheet" type="text/css" href="index.css">
        <link rel="icon" type="image/png" href="imagens/icon.png">
        <script src="javascript/jquery.min.js"></script>
        <script src="javascript/transition.js"></script>
        <style></style>
    </head>
    <body>
        <div class="main">
            <div class="header">
                <div class="logo">
                    <a class="home-logo" href="index.php"><img class="img-logo" src="imagens\abrigo.png" alt="Logotipo"></a>
                    <h1 class="title">ONG ABRIGO AMIGO FIEL</h1>
                </div>
                <div class="menu">
                    <a class="a-options" id="a-sobre" href="sobre.php">Sobre Nós</a>
                    <a class="a-options" id="a-contato" href="contato.php">Contato</a>
                </div>
            </div>
            <div class='corpo'>
            </div>
        </div>
    </body>
</html>
