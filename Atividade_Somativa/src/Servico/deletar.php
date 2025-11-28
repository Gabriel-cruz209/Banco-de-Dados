<?php
$conn = new mysqli("localhost", "root","senaisp", "mecanica");
if($conn->connect_error) exit("Erro de conexão");

// aceitar GET?id=...
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<p>ID do serviço inválido.</p><p><a href='index.php'>Voltar</a></p>";
    $conn->close();
    exit;
}

$id = (int) $_GET['id'];

// Verificar referências em OS
$check = $conn->prepare("SELECT COUNT(*) FROM OS WHERE id_servico = ?");
if ($check) {
    $check->bind_param('i', $id);
    $check->execute();
    $check->bind_result($count);
    $check->fetch();
    $check->close();
    if ($count > 0) {
        echo "<div class='forma'>";
        echo "<p>Não é possível excluir: existem " . $count . " ordem(ns) de serviço relacionadas a este serviço.</p>";
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

$stmt = $conn->prepare("DELETE FROM Servico WHERE id_servico = ?");
if (!$stmt) {
    echo "<p>Erro ao preparar exclusão: " . htmlspecialchars($conn->error) . "</p><p><a href='index.php'>Voltar</a></p>";
    $conn->close();
    exit;
}

$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    echo "<div class='forma'>";
    echo "<p>Serviço deletado com sucesso!</p>";
    echo "<p><a href='index.php'>Voltar</a></p>";
    echo "</div>";
} else {
    echo "<div class='forma'>";
    echo "<p>Erro ao deletar serviço: " . htmlspecialchars($stmt->error) . "</p>";
    echo "<p><a href='index.php'>Voltar</a></p>";
    echo "</div>";
}

$stmt->close();
$conn->close();
exit;

?>