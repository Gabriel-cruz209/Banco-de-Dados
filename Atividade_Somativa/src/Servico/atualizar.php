<?php
$conn = new mysqli("localhost", "root","senaisp", "mecanica");
if($conn->connect_error) exit("Erro de conexão");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_servico = $_POST['id_servico'];
    $nome_servico = $_POST['nome_servico'];
    $tipo_servico = $_POST['tipo_servico'];
    $preco_servico = $_POST['preco_servico'];
    $descricao_servico = $_POST['descricao_servico'];

    $stmt = $conn->prepare("UPDATE Servico SET nome_servico=?, tipo_servico=?, preco_servico=?, descricao_servico=? WHERE id_servico=?");
    $preco = isset($preco_servico) ? (float)$preco_servico : 0;
    $stmt->bind_param("ssdsi", $nome_servico, $tipo_servico, $preco, $descricao_servico, $id_servico);
    if ($stmt->execute()) {
        echo "Serviço atualizado com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();

header("Location: index.php");
exit;

?>