<?php 

$conn = new mysqli("localhost", "root", "senaisp", "mecanica");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Lógica para gerenciar o relacionamento entre serviços e peças
$servico_id = $_POST['servico_id'];
$peca_id = $_POST['peca_id'];
$quantidade = $_POST['quantidade'];

$sql = "INSERT INTO Servicos_Pecas(servico_id, peca_id, quantidade) VALUES ('$servico_id', '$peca_id', '$quantidade')";
if ($conn->query($sql) === TRUE) {
    echo "Relacionamento entre serviço e peça cadastrado com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>