<?php
require_once '../config/database.php';

// Fetch mechanics from the database
$sql = "SELECT * FROM Mecanico";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Mecânicos</title>
    <link rel="stylesheet" href="../../public/assets/css/global.css">
</head>
<body>
    <?php include '../shared/header.php'; ?>

    <h1>Lista de Mecânicos</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Endereço</th>
                <th>CPF</th>
                <th>Celular</th>
                <th>Salário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['nome_mecanico']; ?></td>
                        <td><?php echo $row['email_mecanico']; ?></td>
                        <td><?php echo $row['endereco_mecanico']; ?></td>
                        <td><?php echo $row['cpf_mecanico']; ?></td>
                        <td><?php echo $row['celular_mecanico']; ?></td>
                        <td><?php echo $row['salario_mecanico']; ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>
                            <a href="deletar.php?id=<?php echo $row['id']; ?>">Deletar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Nenhum mecânico cadastrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="inserir.php">Adicionar Novo Mecânico</a>

    <?php include '../shared/footer.php'; ?>
</body>
</html>