<?php
require_once '../config/database.php';

// Fetch clients from the database
$sql = "SELECT * FROM Cliente";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="../../public/assets/css/global.css">
</head>
<body>

<?php include '../shared/header.php'; ?>

<h1>Lista de Clientes</h1>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Endereço</th>
            <th>CPF</th>
            <th>Celular</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['nome_cliente']; ?></td>
                    <td><?php echo $row['email_cliente']; ?></td>
                    <td><?php echo $row['endereco_cliente']; ?></td>
                    <td><?php echo $row['cpf_cliente']; ?></td>
                    <td><?php echo $row['celular_cliente']; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>
                        <a href="deletar.php?id=<?php echo $row['id']; ?>">Deletar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Nenhum cliente encontrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<a href="inserir.php">Adicionar Novo Cliente</a>

<?php include '../shared/footer.php'; ?>

</body>
</html>