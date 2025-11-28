<?php
$conn = new mysqli("localhost", "root","senaisp", "mecanica");
if($conn->connect_error) exit("Erro de conexão");

// aceitar GET?id=...
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<p>ID do veículo inválido.</p><p><a href='index.php'>Voltar</a></p>";
    $conn->close();
    exit;
}

$id = (int) $_GET['id'];

// Verificar referências em possuem
$check = $conn->prepare("SELECT COUNT(*) FROM possuem WHERE id_veiculo = ?");
if ($check) {
    $check->bind_param('i', $id);
    $check->execute();
    $check->bind_result($count);
    $check->fetch();
    $check->close();
    if ($count > 0) {
        echo "<div class='forma'>";
        echo "<p>Não é possível excluir: existem " . $count . " registro(s) em 'possuem' relacionados a este veículo.</p>";
        echo "<p><a href='index.php'>Voltar</a></p>";
        echo "</div>";
        $conn->close();
        exit;
    }
}

// Verificar referências em OS
$check2 = $conn->prepare("SELECT COUNT(*) FROM OS WHERE id_veiculo = ?");
if ($check2) {
    $check2->bind_param('i', $id);
    $check2->execute();
    $check2->bind_result($count2);
    $check2->fetch();
    $check2->close();
    if ($count2 > 0) {
        echo "<div class='forma'>";
        echo "<p>Não é possível excluir: existem " . $count2 . " ordem(ns) de serviço relacionadas a este veículo.</p>";
        echo "<p><a href='index.php'>Voltar</a></p>";
        echo "</div>";
        $conn->close();
        exit;
    }
}

$stmt = $conn->prepare("DELETE FROM Veiculo WHERE id_veiculo = ?");
if (!$stmt) {
    echo "<p>Erro ao preparar exclusão: " . htmlspecialchars($conn->error) . "</p><p><a href='index.php'>Voltar</a></p>";
    $conn->close();
    exit;
}

$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    echo "<div class='forma'>";
    echo "<p>Veículo deletado com sucesso!</p>";
    echo "<p><a href='index.php'>Voltar</a></p>";
    echo "</div>";
} else {
    echo "<div class='forma'>";
    echo "<p>Erro ao deletar veículo: " . htmlspecialchars($stmt->error) . "</p>";
    echo "<p><a href='index.php'>Voltar</a></p>";
    echo "</div>";
}

$stmt->close();
$conn->close();
exit;

?>