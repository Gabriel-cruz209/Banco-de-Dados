<?php 

require_once '../config/database.php';

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if($conn->connect_error){
    die("Erro de conexão: ". $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_servico = $_POST['id_servico'];
    $nome_servico = $_POST['nome_servico'];
    $tipo_servico = $_POST['tipo_servico'];
    $preco_servico = $_POST['preco_servico'];
    $descricao_servico = $_POST['descricao_servico'];

    $sql = "UPDATE Servico SET nome_servico='$nome_servico', tipo_servico='$tipo_servico', preco_servico='$preco_servico', descricao_servico='$descricao_servico' WHERE id_servico='$id_servico'";

    if ($conn->query($sql) === TRUE) {
        echo "Serviço atualizado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}

$conn->close();

header("Location: index.php");
exit;

?>