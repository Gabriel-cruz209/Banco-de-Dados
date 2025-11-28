<?php 

$conn = new mysqli("localhost", "root", "senaisp", "mecanica");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $preco_os = $_POST['preco_os'];
    $data_inicio_os = $_POST['data_inicio_os'];
    $descricao_os = $_POST['descricao_os'];
    $data_termino_os = $_POST['data_termino_os'];

    // Atualiza a ordem de serviço no banco de dados
    $sql = "UPDATE OS SET preco_os='$preco_os', data_inicio_os='$data_inicio_os', descricao_os='$descricao_os', data_termino_os='$data_termino_os' WHERE id_os='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Ordem de serviço atualizada com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}

$conn->close();
?>