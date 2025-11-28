<?php 
$conn = new mysqli("localhost", "root","senaisp", "mecanica");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM Mecanico WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $mecanico = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome_mecanico = $_POST['nome_mecanico'];
    $cpf_mecanico = $_POST['cpf_mecanico'];
    $celular_mecanico = $_POST['celular_mecanico'];
    $endereco_mecanico = $_POST['endereco_mecanico'];
    $email_mecanico = $_POST['email_mecanico'];
    $salario_mecanico = $_POST['salario_mecanico'];

    $sql = "UPDATE Mecanico SET nome_mecanico=?, email_mecanico=?, endereco_mecanico=?, cpf_mecanico=?, celular_mecanico=?, salario_mecanico=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $nome_mecanico, $email_mecanico, $endereco_mecanico, $cpf_mecanico, $celular_mecanico, $salario_mecanico, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/global.css">
    <title>Editar Mecânico</title>
</head>
<body>
    <h1>Editar Mecânico</h1>
    <form action="editar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $mecanico['id']; ?>">
        <label for="nome_mecanico">Nome:</label>
        <input type="text" name="nome_mecanico" value="<?php echo $mecanico['nome_mecanico']; ?>" required>
        
        <label for="email_mecanico">Email:</label>
        <input type="email" name="email_mecanico" value="<?php echo $mecanico['email_mecanico']; ?>" required>
        
        <label for="endereco_mecanico">Endereço:</label>
        <input type="text" name="endereco_mecanico" value="<?php echo $mecanico['endereco_mecanico']; ?>" required>
        
        <label for="cpf_mecanico">CPF:</label>
        <input type="text" name="cpf_mecanico" value="<?php echo $mecanico['cpf_mecanico']; ?>" required>
        
        <label for="celular_mecanico">Celular:</label>
        <input type="text" name="celular_mecanico" value="<?php echo $mecanico['celular_mecanico']; ?>" required>
        
        <label for="salario_mecanico">Salário:</label>
        <input type="text" name="salario_mecanico" value="<?php echo $mecanico['salario_mecanico']; ?>" required>
        
        <button type="submit">Atualizar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>