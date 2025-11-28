<?php 

require_once '../config/database.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($conn->connect_error){
    die("Erro de conexão: ". $conn->connect_error);
}

// Coleta os dados do formulário
$nome_cliente = $_POST['nome_cliente'];
$email_cliente = $_POST['email_cliente'];
$endereco_cliente = $_POST['endereco_cliente'];
$cpf_cliente = $_POST['cpf_cliente'];
$celular_cliente = $_POST['celular_cliente'];

// Prepara a consulta SQL
$sql = "INSERT INTO Cliente(nome_cliente, email_cliente, endereco_cliente, cpf_cliente, celular_cliente) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nome_cliente, $email_cliente, $endereco_cliente, $cpf_cliente, $celular_cliente);

// Executa a consulta e verifica o resultado
if ($stmt->execute()) {
    echo "Cliente cadastrado com sucesso!";
} else {
    echo "Erro: " . $stmt->error;
}

// Fecha a conexão
$stmt->close();
$conn->close();

// Redireciona para a página de clientes
header("Location: index.php");
exit;

?>