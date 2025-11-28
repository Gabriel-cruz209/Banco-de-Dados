<?php 

$conn = new mysqli("localhost", "root", "senaisp", "mecanica");

// aceitar GET?id=...
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<p>ID da peça inválido.</p><p><a href='index.php'>Voltar</a></p>";
    $conn->close();
    exit;
}

$id = (int) $_GET['id'];

// Verificar referências em OS
$check = $conn->prepare("SELECT COUNT(*) FROM OS WHERE id_peca = ?");
if ($check) {
    $check->bind_param('i', $id);
    $check->execute();
    $check->bind_result($count);
    $check->fetch();
    $check->close();
    if ($count > 0) {
        echo "<div class='forma'>";
        echo "<p>Não é possível excluir: existem " . $count . " ordem(ns) de serviço relacionadas a esta peça.</p>";
        echo "<p><a href='index.php'>Voltar</a></p>";
        echo "</div>";
        $conn->close();
        exit;
    }
} else {
    echo "<p>Erro interno: " . htmlspecialchars($conn->error) . "</p><p><a href='index.php'>Voltar</a></p>";
    $conn->close();
    exit;
}

$stmt = $conn->prepare("DELETE FROM Peca WHERE id_peca = ?");
if (!$stmt) {
    echo "<p>Erro ao preparar exclusão: " . htmlspecialchars($conn->error) . "</p><p><a href='index.php'>Voltar</a></p>";
    $conn->close();
    exit;
}

$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    echo "<div class='forma'>";
    echo "<p>Peça deletada com sucesso!</p>";
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
?>