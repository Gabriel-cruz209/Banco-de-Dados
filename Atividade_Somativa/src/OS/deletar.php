<?php 

$conn = new mysqli("localhost", "root", "senaisp", "mecanica");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// aceitar GET?id=...
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<p>ID da OS inválido.</p><p><a href='index.php'>Voltar</a></p>";
    $conn->close();
    exit;
}

$id = (int) $_GET['id'];

$stmt = $conn->prepare("DELETE FROM OS WHERE id_os = ?");
if (!$stmt) {
    echo "<p>Erro ao preparar exclusão: " . htmlspecialchars($conn->error) . "</p><p><a href='index.php'>Voltar</a></p>";
    $conn->close();
    exit;
}

$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    echo "<div class='forma'>";
    echo "<p>Ordem de serviço deletada com sucesso!</p>";
    echo "<p><a href='index.php'>Voltar</a></p>";
    echo "</div>";
} else {
    echo "<div class='forma'>";
    echo "<p>Erro: " . htmlspecialchars($stmt->error) . "</p>";
    echo "<p><a href='index.php'>Voltar</a></p>";
    echo "</div>";
}

$stmt->close();
$conn->close();
exit;