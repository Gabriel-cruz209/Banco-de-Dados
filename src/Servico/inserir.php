<?php 

$conn = new mysqli("localhost", "root", "senaisp", "mecanica");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Dados do serviço
$nome_servico = $_POST['nome_servico'];
$tipo_servico = $_POST['tipo_servico'];
$preco_servico = $_POST['preco_servico'];
$descricao_servico = $_POST['descricao_servico'];

// Inserção no banco de dados
$sql = "INSERT INTO Servico(nome_servico, tipo_servico, descricao_servico, preco_servico) VALUES ('$nome_servico', '$tipo_servico', '$descricao_servico', '$preco_servico')";
if ($conn->query($sql) === TRUE) {
    echo "Serviço cadastrado com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}

header("Location: index.php");
exit;

$conn->close();
?>