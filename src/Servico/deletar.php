<?php 

require_once '../config/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM Servico WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Serviço deletado com sucesso!";
    } else {
        echo "Erro ao deletar serviço: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID do serviço não especificado.";
}

$conn->close();

header("Location: index.php");
exit;

?>