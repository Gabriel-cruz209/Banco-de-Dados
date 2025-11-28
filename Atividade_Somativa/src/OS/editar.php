<?php 

$conn = new mysqli("localhost", "root","senaisp", "mecanica");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_os = $_POST['id_os'];
    $preco_os = $_POST['preco_os'];
    $data_inicio_os = $_POST['data_inicio_os'];
    $descricao_os = $_POST['descricao_os'];
    $data_termino_os = $_POST['data_termino_os'];

    $stmt = $conn->prepare("UPDATE OS SET preco_os = ?, data_inicio_os = ?, descricao_os = ?, data_termino_os = ? WHERE id_os = ?");
    $stmt->bind_param("dsssi", $preco_os, $data_inicio_os, $descricao_os, $data_termino_os, $id_os);
    if ($stmt->execute()) {
        echo "Ordem de serviço atualizada com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }
    $stmt->close();
} else {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM OS WHERE id_os = ?");
    $stmt->bind_param("ssssi", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $os = $result->fetch_assoc();
    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Editar Ordem de Serviço</title>
</head>
<body>
    <header>
        <a href="index.php">Voltar</a>
    </header>
    <h1>Editar Ordem de Serviço</h1>
    <form action="editar.php" method="POST">
        <input type="hidden" name="id_os" value="<?php echo $os['id_os']; ?>">
        <label for="preco_os">Preço:</label>
        <input type="text" name="preco_os" value="<?php echo $os['preco_os']; ?>" required>
        
        <label for="data_inicio_os">Data de Início:</label>
        <input type="date" name="data_inicio_os" value="<?php echo $os['data_inicio_os']; ?>" required>
        
        <label for="descricao_os">Descrição:</label>
        <textarea name="descricao_os" required><?php echo $os['descricao_os']; ?></textarea>
        
        <label for="data_termino_os">Data de Término:</label>
        <input type="date" name="data_termino_os" value="<?php echo $os['data_termino_os']; ?>" required>
        
        <button type="submit">Atualizar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>

<?php 
$conn->close();
?>