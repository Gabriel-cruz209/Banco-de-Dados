<?php 

$conn = new mysqli("localhost", "root", "senaisp", "mecanica");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Dados da peça
$nome_peca = $_POST['nome_peca'];
$tipo_peca = $_POST['tipo_peca'];
$preco_peca = $_POST['preco_peca'];
$descricao_peca = $_POST['descricao_peca'];

$sql = "INSERT INTO Peca(nome_peca, tipo_peca, preco_peca, descricao_peca) VALUES ('$nome_peca', '$tipo_peca', '$preco_peca', '$descricao_peca')";
if ($conn->query($sql) === TRUE) {
    echo "Peça cadastrada com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}

header("Location: index.php");
exit;

$conn->close();
?>