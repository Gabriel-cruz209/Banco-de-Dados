<?php
$conn = new mysqli("localhost", "root", "senaisp", "mecanica");
if ($conn->connect_error) exit("Erro de conexão");

$sql = "SELECT * FROM Veiculo";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Veículos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<h1>Lista de Veículos</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Ano</th>
            <th>Cor</th>
            <th>Placa</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id_veiculo']; ?></td>
                    <td><?php echo $row['marca_veiculo']; ?></td>
                    <td><?php echo $row['modelo_veiculo']; ?></td>
                    <td><?php echo $row['ano_veiculo']; ?></td>
                    <td><?php echo $row['cor_veiculo']; ?></td>
                    <td><?php echo $row['placa_veiculo']; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $row['id_veiculo']; ?>">Editar</a>
                        <a href="deletar.php?id=<?php echo $row['id_veiculo']; ?>">Deletar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">Nenhum veículo encontrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<a href="index.html">Adicionar Novo Veículo</a>


<?php
if (isset($result) && is_object($result)) $result->free();
$conn->close();
?>

</body>
</html>
