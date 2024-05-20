<?php 
    
include "General/database.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <title>ONG Abrigo Amigo Fiel</title>
        <link rel="stylesheet" type="text/css" href="admin.css">
        <link rel="icon" type="image/png" href="/imagens/icon.png">
        <script src="javascript/jquery.min.js"></script>
        <script src="javascript/transition.js"></script>
        <script src="javascript/remove.js"></script>
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
            <div class='include'>
                <form class="add" action="adicionar.php" method="POST" enctype="multipart/form-data">
                    <input class="nome-sbmt" id="nome-sbmt" name="nome-sbmt" placeholder="NOME" required>
                    <input class="descricao-sbmt" id="descricao-sbmt" name="descricao-sbmt" placeholder="DESCRIÇÃO" required>
                    <input type="file" id="sbmt-pic" class="sbmt-pic" name="sbmt-pic" >
                    <input type="submit" value="ENVIAR" class="botao-submit">
                </form>
            </div>
            <div class='corpo'>
        <?php   
            $select_query_geral = "select id, name, descricao, foto from cadastro";
            $result_query_geral = mysqli_query($conexao, $select_query_geral);

            $nomes = [];
            $contador = 1;
            
            while ($row_query_geral = mysqli_fetch_assoc($result_query_geral)){
                $nome = $row_query_geral['name'];
                $descricao = $row_query_geral['descricao'];
                $foto = $row_query_geral['foto'];
                $id = $row_query_geral['id'];?>

            <div class='dogs'>
                <form id="editForm" action="editar.php" method="POST" enctype="multipart/form-data" class="form-edit">
                    <input type="hidden"  name="foto" value="<?php echo $foto ?>">
                    <input type="hidden"  name="id" value="<?php echo $id ?>">
                    <div class="imagem">
                        <img class='img-dogs' name='edt-foto' src='imagens/<?php echo $foto ?>'>
                        <input class="submit-image" type="file" name='upd-foto'>
                    </div>
                    <input type="text" name='edt-nome' class='dog-name' value="<?php echo $nome ?>">
                    <input type="text" class='dog-desc' name='edt-descricao' value="<?php echo $descricao ?>">
                    <div class="edit">
                        <input class="edit-btn" type="submit" value="Editar">
                    </div>
                </form>
                <div class="remove">
                    <button onclick="showConfirmation('<?php echo $nome ?>', '<?php echo $foto ?>', '<?php echo $id ?>', event)" class="rmv-btn">Remover</button>
                </div>
            </div>
<?php
            }?>
            </div>
        </div>
    </body>
</html>