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

    $id_cliente = $_POST['id_cliente'];
    $id_peca = $_POST['id_peca'];
    $id_mecanico = $_POST['id_mecanico'];
    $id_servico = $_POST['id_servico'];
    $id_veiculo = $_POST['id_veiculo'];

    $stmt = $conn->prepare("
        UPDATE OS 
        SET preco_os = ?, data_inicio_os = ?, descricao_os = ?, data_termino_os = ?, 
            id_cliente = ?, id_peca = ?, id_mecanico = ?, id_servico = ?, id_veiculo = ?
        WHERE id_os = ?
    ");

    $stmt->bind_param(
        "dsssiiiii",
        $preco_os,
        $data_inicio_os,
        $descricao_os,
        $data_termino_os,
        $id_cliente,
        $id_peca,
        $id_mecanico,
        $id_servico,
        $id_veiculo,
        $id_os
    );

    if ($stmt->execute()) {
        echo "Ordem de serviço atualizada com sucesso!";
        header("refresh:1; url=index.php");
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();

} else {

    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM OS WHERE id_os = ?");
    $stmt->bind_param("i", $id);
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

        <!-- CLIENTE -->
        <label>Cliente:</label>
        <input type="number" name="id_cliente" value="<?php echo $os['id_cliente']; ?>" required>

        <!-- VEÍCULO -->
        <label>Veículo:</label>
        <input type="number" name="id_veiculo" value="<?php echo $os['id_veiculo']; ?>" required>

        <!-- MECÂNICO -->
        <label>Mecânico:</label>
        <input type="number" name="id_mecanico" value="<?php echo $os['id_mecanico']; ?>" required>

        <!-- SERVIÇO -->
        <label>Serviço:</label>
        <input type="number" name="id_servico" value="<?php echo $os['id_servico']; ?>" required>

        <!-- PEÇA -->
        <label>Peça utilizada:</label>
        <input type="number" name="id_peca" value="<?php echo $os['id_peca']; ?>" required>

        <!-- CAMPOS DA OS -->
        <label>Preço:</label>
        <input type="text" name="preco_os" value="<?php echo $os['preco_os']; ?>" required>

        <label>Data de Início:</label>
        <input type="date" name="data_inicio_os" value="<?php echo $os['data_inicio_os']; ?>" required>

        <label>Descrição:</label>
        <textarea name="descricao_os" required><?php echo $os['descricao_os']; ?></textarea>

        <label>Data de Término:</label>
        <input type="date" name="data_termino_os" value="<?php echo $os['data_termino_os']; ?>" required>

        <button type="submit">Atualizar</button>

    </form>

    <a href="index.php">Voltar</a>
</body>

</html>

<?php 
$conn->close();
?>
