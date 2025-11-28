<?php 

$conn = new mysqli("localhost", "root", "senaisp", "mecanica");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$nome_servico = $_POST['nome_servico'];
$tipo_servico = $_POST['tipo_servico'];
$preco_servico = isset($_POST['preco_servico']) ? (float)$_POST['preco_servico'] : 0;
$descricao_servico = $_POST['descricao_servico'];

$stmt = $conn->prepare("INSERT INTO Servico(nome_servico, tipo_servico, descricao_servico, preco_servico) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssd", $nome_servico, $tipo_servico, $descricao_servico, $preco_servico);
if ($stmt->execute()) {
    echo "Serviço cadastrado com sucesso!";
} else {
    echo "Erro: " . $stmt->error;
}

$stmt->close();
$conn->close();
header("Location: index.php");
exit;
?>