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

// Query preparada
$sql = "INSERT INTO OS (preco_os, data_inicio_os, descricao_os, data_termino_os)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Erro no prepare: " . $conn->error);
}

// Tipos dos dados:
// preco = double (d)
// datas = string (s)
// descrição = string (s)
$stmt->bind_param("sssi", $preco_os, $data_inicio_os, $descricao_os, $data_termino_os);

if ($stmt->execute()) {
    echo "Ordem de Serviço cadastrada com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

$stmt->close();
$conn->close();
