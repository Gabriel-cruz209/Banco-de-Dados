<?php 

$conn = new mysqli("localhost", "root", "senaisp", "mecanica");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_peca = $_POST['id_peca'];
    $nome_peca = $_POST['nome_peca'];
    $tipo_peca = $_POST['tipo_peca'];
    $preco_peca = $_POST['preco_peca'];
    $descricao_peca = $_POST['descricao_peca'];

    $sql = "UPDATE Peca SET nome_peca='$nome_peca', tipo_peca='$tipo_peca', preco_peca='$preco_peca', descricao_peca='$descricao_peca' WHERE id_peca='$id_peca'";

    if ($conn->query($sql) === TRUE) {
        echo "Peça atualizada com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}

$conn->close();

header("Location: index.php");
exit;

?>