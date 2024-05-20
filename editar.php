<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

include "General/database.php";




$nome_novo = mysqli_real_escape_string($conexao, $_POST['edt-nome']);
$descricao_novo = mysqli_real_escape_string($conexao, $_POST['edt-descricao']);
$foto_antigo = mysqli_real_escape_string($conexao, $_POST['foto']);
$id = mysqli_real_escape_string($conexao, $_POST['id']);


if (!empty($_FILES['upd-foto']['name'])) {
    // Verifica se o arquivo subiu no servidor sem erros
    if ($_FILES['upd-foto']['error'] === UPLOAD_ERR_OK) {
        // Diretório onde será salvo a imagem
        $targetDirectory = "imagens/";

        // Pegar o nome da foto para salvar na pasta e no banco de dados depois
        $imageName = basename($_FILES["upd-foto"]["name"]);

        // O caminho com o nome da imagem que será salvo
        $targetPath = $targetDirectory . $imageName;

        // Upload da foto para a pasta imagens:
        if (move_uploaded_file($_FILES["upd-foto"]["tmp_name"], $targetPath)) {
            echo "The file " . $imageName . " has been uploaded.";

            $foto_novo = $imageName;
            $query_atualiza = "UPDATE cadastro SET name = '$nome_novo', descricao = '$descricao_novo', foto = '$foto_novo' WHERE id = '$id'";
            $result_insere = mysqli_query($conexao, $query_atualiza);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "No file uploaded or an error occurred during upload.";
    }
}

if (empty($_FILES['upd-foto']['name'])){
    $query_atualiza = "UPDATE cadastro SET name = '$nome_novo', descricao = '$descricao_novo' WHERE id = '$id'";
    $result_insere = mysqli_query($conexao, $query_atualiza);
}
header('Location: admin.php');
exit()
?>