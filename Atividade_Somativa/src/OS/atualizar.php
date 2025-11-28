<?php

$conn = new mysqli("localhost", "root", "senaisp", "mecanica");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];

    $preco_os       = $_POST['preco_os'];
    $data_inicio_os = $_POST['data_inicio_os'];
    $descricao_os   = $_POST['descricao_os'];
    $data_termino_os= $_POST['data_termino_os'];

    $id_cliente  = $_POST['id_cliente'];
    $id_peca     = $_POST['id_peca'];
    $id_mecanico = $_POST['id_mecanico'];
    $id_servico  = $_POST['id_servico'];
    $id_veiculo  = $_POST['id_veiculo'];

    $stmt = $conn->prepare("
        UPDATE OS SET
            preco_os=?, data_inicio_os=?, descricao_os=?, data_termino_os=?,
            id_cliente=?, id_peca=?, id_mecanico=?, id_servico=?, id_veiculo=?
        WHERE id_os=?
    ");

    $stmt->bind_param(
        "dsssiiiii",
        $preco_os,
        $data_inicio_os,
        $descricao_os,
        $data_termino_os,
        $id_cliente,
        $id_peca,
        $id_mecanico,
        $id_servico,
        $id_veiculo,
        $id
    );

    if ($stmt->execute()) {
        echo "Ordem de serviço atualizada com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
