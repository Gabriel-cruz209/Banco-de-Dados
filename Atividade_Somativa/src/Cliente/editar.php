<?php 


$conn = new mysqli("localhost", "root","senaisp", "mecanica");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM Cliente WHERE id_cliente = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $cliente = $result->fetch_assoc();
    } else {
        echo "Cliente não encontrado.";
        exit;
    }
} else {
    echo "ID do cliente não especificado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="index.php">Voltar</a>
    </header>

    <main>
        <h1>Editar Cliente</h1>
        <form action="atualizar.php" method="POST">
            <input type="hidden" name="id_cliente" value="<?php echo $cliente['id_cliente']; ?>">
            <label for="nome_cliente">Nome:</label>
            <input type="text" name="nome_cliente" id="nome_cliente" value="<?php echo $cliente['nome_cliente']; ?>" required>

            <label for="email_cliente">Email:</label>
            <input type="email" name="email_cliente" id="email_cliente" value="<?php echo $cliente['email_cliente']; ?>" required>

            <label for="endereco_cliente">Endereço:</label>
            <input type="text" name="endereco_cliente" id="endereco_cliente" value="<?php echo $cliente['endereco_cliente']; ?>" required>

            <label for="cpf_cliente">CPF:</label>
            <input type="text" name="cpf_cliente" id="cpf_cliente" value="<?php echo $cliente['cpf_cliente']; ?>" required>

            <label for="celular_cliente">Celular:</label>
            <input type="text" name="celular_cliente" id="celular_cliente" value="<?php echo $cliente['celular_cliente']; ?>" required>

            <button type="submit">Atualizar</button>
        </form>
    </main>

</body>
</html>

<?php 
$conn->close();
?>