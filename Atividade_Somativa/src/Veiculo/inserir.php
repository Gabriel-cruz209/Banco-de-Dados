<?php 

$conn = new mysqli("localhost", "root", "senaisp", "mecanica");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Dados do veículo
$marca_carro = $_POST['marca_veiculo'];
$modelo_carro = $_POST['modelo_veiculo'];
$ano_carro = isset($_POST['ano_veiculo']) ? (int)$_POST['ano_veiculo'] : 0;
$cor_carro = $_POST['cor_veiculo'];
$placa_carro = $_POST['placa_veiculo'];

$stmt = $conn->prepare("INSERT INTO Veiculo(marca_veiculo, modelo_veiculo, ano_veiculo, cor_veiculo, placa_veiculo) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssiss", $marca_carro, $modelo_carro, $ano_carro, $cor_carro, $placa_carro);
if ($stmt->execute()) {
    echo "Veículo cadastrado com sucesso!";
} else {
    echo "Erro: " . $stmt->error;
}

$stmt->close();
$conn->close();
header("Location: index.php");
exit;
?>