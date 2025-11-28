<?php 

$conn = new mysqli("localhost", "root", "senaisp", "mecanica");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Dados do veículo
$marca_carro = $_POST['marca_veiculo'];
$modelo_carro = $_POST['modelo_veiculo'];
$ano_carro = $_POST['ano_veiculo'];
$cor_carro = $_POST['cor_veiculo'];
$placa_carro = $_POST['placa_veiculo'];

// Inserção no banco de dados
$sql = "INSERT INTO Veiculo(marca_veiculo, modelo_veiculo, ano_veiculo, cor_veiculo, placa_veiculo) VALUES ('$marca_carro', '$modelo_carro', '$ano_carro', '$cor_carro', '$placa_carro')";

if ($conn->query($sql) === TRUE) {
    echo "Veículo cadastrado com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}

header("Location: index.php");
exit;

$conn->close();
?>