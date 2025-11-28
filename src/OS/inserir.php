<?php 

$conn = new mysqli("localhost", "root", "senaisp", "mecanica");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Dados da Ordem de Serviço
$preco_os = $_POST['preco_os'];
$data_inicio_os = $_POST['data_inicio_os'];
$descricao_os = $_POST['descricao_os'];
$data_termino_os = $_POST['data_termino_os'];

// Inserção no banco de dados
$sql = "INSERT INTO OS(preco_os, data_inicio_os, descricao_os, data_termino_os) VALUES ('$preco_os', '$data_inicio_os', '$descricao_os', '$data_termino_os')";
if ($conn->query($sql) === TRUE) {
    echo "Ordem de Serviço cadastrada com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}

header("Location: index.php");
exit;

$conn->close();
?>