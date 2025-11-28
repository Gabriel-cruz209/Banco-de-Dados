<?php 

$conn = new mysqli("localhost", "root", "senaisp", "mecanica");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Dados da peça
$nome_peca = $_POST['nome_peca'];
$tipo_peca = $_POST['tipo_peca'];
$preco_peca = isset($_POST['preco_peca']) ? (float)$_POST['preco_peca'] : 0;
$descricao_peca = $_POST['descricao_peca'];

$stmt = $conn->prepare("INSERT INTO Peca(nome_peca, tipo_peca, preco_peca, descricao_peca) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssds", $nome_peca, $tipo_peca, $preco_peca, $descricao_peca);
if ($stmt->execute()) {
    echo "Peça cadastrada com sucesso!";
} else {
    echo "Erro: " . $stmt->error;
}

$stmt->close();
$conn->close();
header("Location: index.php");
exit;
?>