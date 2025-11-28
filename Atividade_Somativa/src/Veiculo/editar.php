<?php 
$conn = new mysqli("localhost", "root", "senaisp", "mecanica");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM Veiculo WHERE id_veiculo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $veiculo = $result->fetch_assoc();
    } else {
        echo "Veículo não encontrado.";
        exit;
    }
} else {
    echo "ID não fornecido.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $marca = $_POST['marca_veiculo'];
    $modelo = $_POST['modelo_veiculo'];
    $ano = $_POST['ano_veiculo'];
    $cor = $_POST['cor_veiculo'];
    $placa = $_POST['placa_veiculo'];

    $sql = "UPDATE Veiculo SET marca_veiculo = ?, modelo_veiculo = ?, ano_veiculo = ?, cor_veiculo = ?, placa_veiculo = ? WHERE id_veiculo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $marca, $modelo, $ano, $cor, $placa, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao atualizar veículo: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Veículo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="index.php">Voltar</a>
    </header>
    <h1>Editar Veículo</h1>
    <form method="POST">
        <label for="marca_veiculo">Marca:</label>
        <input type="text" name="marca_veiculo" value="<?php echo $veiculo['marca_veiculo']; ?>" required>

        <label for="modelo_veiculo">Modelo:</label>
        <input type="text" name="modelo_veiculo" value="<?php echo $veiculo['modelo_veiculo']; ?>" required>

        <label for="ano_veiculo">Ano:</label>
        <input type="date" name="ano_veiculo" value="<?php echo $veiculo['ano_veiculo']; ?>" required>

        <label for="cor_veiculo">Cor:</label>
        <input type="text" name="cor_veiculo" value="<?php echo $veiculo['cor_veiculo']; ?>" required>

        <label for="placa_veiculo">Placa:</label>
        <input type="text" name="placa_veiculo" value="<?php echo $veiculo['placa_veiculo']; ?>" required>

        <button type="submit">Atualizar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>

<?php 
$conn->close();
?>