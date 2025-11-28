<?php 
require_once '../config/database.php';

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
} else {
    $id_peca = $_GET['id_peca'];
    $sql = "SELECT * FROM Peca WHERE id_peca='$id_peca'";
    $result = $conn->query($sql);
    $peca = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Peça</title>
    <link rel="stylesheet" href="../../public/assets/css/global.css">
</head>
<body>
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