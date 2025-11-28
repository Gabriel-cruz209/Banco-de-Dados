<?php 



$conn = new mysqli("localhost", "root","senaisp", "mecanica");

if($conn->connect_error){
    die("Erro de conexão: ". $conn->connect_error);
}

$nome_cliente = $_POST['nome_cliente'];
$email_cliente = $_POST['email_cliente'];
$endereco_cliente = $_POST['endereco_cliente'];
$cpf_cliente = $_POST['cpf_cliente'];
$celular_cliente = $_POST['celular_cliente'];
$sql = "INSERT INTO Cliente(nome_cliente, email_cliente, endereco_cliente, cpf_cliente, celular_cliente) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nome_cliente, $email_cliente, $endereco_cliente, $cpf_cliente, $celular_cliente);

if ($stmt->execute()) {
    echo "Cliente cadastrado com sucesso!";
} else {
    echo "Erro: " . $stmt->error;
}

$stmt->close();
$conn->close();

header("Location: index.php");
exit;

?>