<?php
$conn = new mysqli("localhost", "root","senaisp", "mecanica");
if($conn->connect_error) exit("Erro de conexão");

 $sql = "SELECT * FROM Mecanico";
 $result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Mecânicos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="index.html">Voltar</a>
    </header>
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
                            <a href="editar.php?id=<?php echo $row['id_mecanico']; ?>">Editar</a>
                            <a href="deletar.php?id=<?php echo $row['id_mecanico']; ?>">Deletar</a>
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

    <a href="index.html">Adicionar Novo Mecânico</a>



    <?php
    if (isset($result) && is_object($result)) $result->free();
    $conn->close();
    ?>
</body>
</html>