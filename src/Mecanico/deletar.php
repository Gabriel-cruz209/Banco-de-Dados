<?php 

$conn = new mysqli("localhost", "root","senaisp", "mecanica");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM Mecanico WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Mecânico deletado com sucesso!";
    } else {
        echo "Erro ao deletar mecânico: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "ID não especificado.";
}

$conn->close();

header("Location: index.php");
exit;

?>