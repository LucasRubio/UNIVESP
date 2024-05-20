<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

include "General/database.php";

//Enviar cadastro de um novo dog:


//Capturando os dados passados no form pelo metodo POST:
$nome = mysqli_real_escape_string($conexao, $_POST['nome-sbmt']);
$descricao = mysqli_real_escape_string($conexao, $_POST['descricao-sbmt']);



if(!empty($_POST["nome-sbmt"])) {

    // Verifica se o arquivo subiu no servidor sem erros
    if(isset($_FILES['sbmt-pic']) && $_FILES['sbmt-pic']['error'] === UPLOAD_ERR_OK) {
        // Diretório onde será salvo a image
        $targetDirectory = "imagens/";

        // Pegar o nome da foto para salvar na pasta e no banco de dados depois
        $imageName = basename($_FILES["sbmt-pic"]["name"]);

        // O caminho com o nome da imagem que será salvo
        $targetPath = $targetDirectory . $imageName;

        // Upload da foto para a pasta imagens:
        if(move_uploaded_file($_FILES["sbmt-pic"]["tmp_name"], $targetPath)) {
            echo "The file ". $imageName. " has been uploaded.";

            $foto = $imageName;
            $query_insere = "insert into cadastro (name, descricao, foto) values('$nome', '$descricao', '$foto')";
            $result_insere = mysqli_query($conexao, $query_insere);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "No file uploaded or an error occurred during upload.";
    }
}




header('Location: admin.php');
exit();

?>