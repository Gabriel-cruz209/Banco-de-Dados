<?php 

$conn = new mysqli("localhost", "root", "senaisp", "mecanica");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Verifica se veio via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Dados da Ordem de Serviço
    $preco_os       = $_POST['preco_os'];
    $data_inicio_os = $_POST['data_inicio_os'];
    $descricao_os   = $_POST['descricao_os'];
    $data_termino_os= $_POST['data_termino_os'];
    $id_cliente     = $_POST['id_cliente'];
    $id_peca        = $_POST['id_peca'];
    $id_mecanico    = $_POST['id_mecanico'];
    $id_servico     = $_POST['id_servico'];
    $id_veiculo     = $_POST['id_veiculo'];

    // Query preparada
    $sql = "INSERT INTO OS 
        (preco_os, data_inicio_os, descricao_os, data_termino_os, id_cliente, id_peca, id_mecanico, id_servico, id_veiculo)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Erro no prepare: " . $conn->error);
    }

    // d s s s i i i i i
    $stmt->bind_param(
        "dssssssss",
        $preco_os,
        $data_inicio_os,
        $descricao_os,
        $data_termino_os,
        $id_cliente,
        $id_peca,
        $id_mecanico,
        $id_servico,
        $id_veiculo
    );

    if ($stmt->execute()) {
        echo "Ordem de Serviço cadastrada com sucesso!";
        header("refresh:1; url=index.php");
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
