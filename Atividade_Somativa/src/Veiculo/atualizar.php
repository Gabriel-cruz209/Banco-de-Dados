<?php 

$conn = new mysqli("localhost", "root", "senaisp", "mecanica");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_veiculo = $_POST['id_veiculo'];
    $marca_carro = $_POST['marca_veiculo'];
    $modelo_carro = $_POST['modelo_veiculo'];
    $ano_carro = $_POST['ano_veiculo'];
    $cor_carro = $_POST['cor_veiculo'];
    $placa_carro = $_POST['placa_veiculo'];

    $sql = "UPDATE Veiculo SET marca_veiculo='$marca_carro', modelo_veiculo='$modelo_carro', ano_veiculo='$ano_carro', cor_veiculo='$cor_carro', placa_veiculo='$placa_carro' WHERE id_veiculo='$id_veiculo'";

    if ($conn->query($sql) === TRUE) {
        echo "Veículo atualizado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}

$conn->close();
?>