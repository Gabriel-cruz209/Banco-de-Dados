<?php 

$conn = new mysqli("localhost", "root","senaisp", "mecanica");

if($conn->connect_error){
    die("Erro de conexão: ". $conn->connect_error);
}

// Mecanico
$nome_mecanico = $_POST['nome_mecanico'];
$cpf_mecanico = $_POST['cpf_mecanico'];
$celular_mecanico = $_POST['celular_mecanico'];
$endereco_mecanico = $_POST['endereco_mecanico'];
$email_mecanico = $_POST['email_mecanico'];
$salario_mecanico = $_POST['salario_mecanico'];

$sql = "INSERT INTO Mecanico(nome_mecanico, email_mecanico, endereco_mecanico, cpf_mecanico, celular_mecanico, salario_mecanico) VALUES ('$nome_mecanico', '$email_mecanico', '$endereco_mecanico', '$cpf_mecanico', '$celular_mecanico', '$salario_mecanico')";

if ($conn->query($sql) === TRUE) {
    echo "Mecanico cadastrado com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}

header("Location: index.php");
exit;

$conn->close();
?>