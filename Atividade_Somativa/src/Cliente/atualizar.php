<?php 

$conn = new mysqli("localhost", "root", "senaisp", "mecanica");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_cliente = $_POST['id_cliente'];
    $nome_cliente = $_POST['nome_cliente'];
    $email_cliente = $_POST['email_cliente'];
    $endereco_cliente = $_POST['endereco_cliente'];
    $cpf_cliente = $_POST['cpf_cliente'];
    $celular_cliente = $_POST['celular_cliente'];

    $stmt = $conn->prepare("UPDATE Cliente SET nome_cliente=?, email_cliente=?, endereco_cliente=?, cpf_cliente=?, celular_cliente=? WHERE id_cliente=?");
    $stmt->bind_param("sssssi", $nome_cliente, $email_cliente, $endereco_cliente, $cpf_cliente, $celular_cliente, $id_cliente);
    if ($stmt->execute()) {
        echo "Cliente atualizado com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();

header("Location: index.php");
exit;

?>