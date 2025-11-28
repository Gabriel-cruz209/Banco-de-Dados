<?php 

$conn = new mysqli("localhost", "root", "senaisp", "mecanica");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if (isset($_POST['id_peca'])) {
    $id_peca = $_POST['id_peca'];

    $sql = "DELETE FROM Peca WHERE id_peca = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_peca);

    if ($stmt->execute()) {
        echo "Peça deletada com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID da peça não fornecido.";
}

$conn->close();

header("Location: index.php");
exit;

?>