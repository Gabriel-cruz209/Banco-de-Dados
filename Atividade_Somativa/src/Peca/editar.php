<?php 


$conn = new mysqli("localhost", "root","senaisp", "mecanica");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_peca = $_POST['id_peca'];
    $nome_peca = $_POST['nome_peca'];
    $tipo_peca = $_POST['tipo_peca'];
    $preco_peca = $_POST['preco_peca'];
    $descricao_peca = $_POST['descricao_peca'];

    $stmt = $conn->prepare("UPDATE Peca SET nome_peca=?, tipo_peca=?, preco_peca=?, descricao_peca=? WHERE id_peca=?");
    $stmt->bind_param("ssssi", $nome_peca, $tipo_peca, $preco_peca, $descricao_peca, $id_peca);
    if ($stmt->execute()) {
        echo "Peça atualizada com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }
    $stmt->close();
} else {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        echo "ID inválido.";
        exit;
    }
    $id_peca = (int) $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM Peca WHERE id_peca=?");
    $stmt->bind_param("i", $id_peca);
    $stmt->execute();
    $result = $stmt->get_result();
    $peca = $result->fetch_assoc();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Peça</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="index.php">Voltar</a>
    </header>
    <h1>Editar Peça</h1>
    <form action="editar.php" method="POST">
        <input type="hidden" name="id_peca" value="<?php echo $peca['id_peca']; ?>">
        <label for="nome_peca">Nome:</label>
        <input type="text" name="nome_peca" value="<?php echo $peca['nome_peca']; ?>" required>
        
        <label for="tipo_peca">Tipo:</label>
        <input type="text" name="tipo_peca" value="<?php echo $peca['tipo_peca']; ?>" required>
        
        <label for="preco_peca">Preço:</label>
        <input type="number" name="preco_peca" value="<?php echo $peca['preco_peca']; ?>" required>
        
        <label for="descricao_peca">Descrição:</label>
        <textarea name="descricao_peca" required><?php echo $peca['descricao_peca']; ?></textarea>
        
        <button type="submit">Atualizar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>

<?php
$conn->close();
?>