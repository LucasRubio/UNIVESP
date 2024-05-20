<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

include "General/database.php";

if (!empty($_POST['nome'])) {
    $nome = $_POST['nome'];
    $foto = $_POST['foto'];
    $id = $_POST['id'];
    $query_remove = "delete from cadastro where id = '$id'";
    $result_insere = mysqli_query($conexao, $query_remove);
    if (unlink('imagens/'.$foto)) {
        echo "O arquivo foi removido com sucesso.";
    } else {
        echo "Ocorreu um erro ao tentar remover o arquivo.";
    }
} else {
    echo "Nome do item não especificado!";
}

header('Location: admin.php');
exit()
?>