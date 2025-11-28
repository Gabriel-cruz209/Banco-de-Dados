<?php 

$conn = new mysqli("localhost", "root", "senaisp", "mecanica");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_mecanico = $_POST['nome_mecanico'];
    $cpf_mecanico = $_POST['cpf_mecanico'];
    $celular_mecanico = $_POST['celular_mecanico'];
    $endereco_mecanico = $_POST['endereco_mecanico'];
    $email_mecanico = $_POST['email_mecanico'];
    $salario_mecanico = $_POST['salario_mecanico'];
    $id_mecanico = $_POST['id_mecanico']; // Assuming you have an ID to identify the record

    $sql = "UPDATE Mecanico SET 
                nome_mecanico = '$nome_mecanico', 
                email_mecanico = '$email_mecanico', 
                endereco_mecanico = '$endereco_mecanico', 
                cpf_mecanico = '$cpf_mecanico', 
                celular_mecanico = '$celular_mecanico', 
                salario_mecanico = '$salario_mecanico' 
            WHERE id_mecanico = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Mecanico atualizado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}

$conn->close();

header("Location: index.php");
exit;

?>