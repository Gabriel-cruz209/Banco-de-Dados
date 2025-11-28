<?php 

require_once '../config/database.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM Veiculo WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Veículo deletado com sucesso!";
    } else {
        echo "Erro ao deletar veículo: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "ID do veículo não especificado.";
}

$conn->close();

header("Location: index.php");
exit;

?>