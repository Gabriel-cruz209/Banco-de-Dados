<?php
$conn = new mysqli("localhost", "root","senaisp", "mecanica");
if($conn->connect_error) exit("Erro de conexão");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM Servico WHERE id_servico = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $servico = $result->fetch_assoc();
    } else {
        echo "Serviço não encontrado.";
        exit;
    }
} else {
    echo "ID não fornecido.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Serviço</title>
    <link rel="stylesheet" href="../../public/assets/css/global.css">
</head>
<body>
    <header>
        <a href="index.php">Voltar</a>
    </header>

    <main>
        <h1>Editar Serviço</h1>
        <form action="atualizar.php" method="POST">
            <input type="hidden" name="id_servico" value="<?php echo $servico['id_servico']; ?>">
            <label for="nome_servico">Nome do Serviço:</label>
            <input type="text" id="nome_servico" name="nome_servico" value="<?php echo $servico['nome_servico']; ?>" required>

            <label for="tipo_servico">Tipo de Serviço:</label>
            <input type="text" id="tipo_servico" name="tipo_servico" value="<?php echo $servico['tipo_servico']; ?>" required>

            <label for="preco_servico">Preço:</label>
            <input type="number" id="preco_servico" name="preco_servico" value="<?php echo $servico['preco_servico']; ?>" required>

            <label for="descricao_servico">Descrição:</label>
            <textarea id="descricao_servico" name="descricao_servico" required><?php echo $servico['descricao_servico']; ?></textarea>

            <button type="submit">Atualizar Serviço</button>
        </form>
    </main>

</body>
</html>

<?php 
$conn->close();
?>