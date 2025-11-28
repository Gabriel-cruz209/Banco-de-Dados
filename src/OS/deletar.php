<?php 

$conn = new mysqli("localhost", "root", "senaisp", "mecanica");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM OS WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Ordem de serviço deletada com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
} else {
    echo "ID não fornecido.";
}

$conn->close();
?>