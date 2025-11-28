<?php
$conn = new mysqli("localhost", "root","senaisp", "mecanica");
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$sql = "SELECT * FROM Peca";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Peças</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Lista de Peças</h1>
        <a href="index.html">Adicionar Nova Peça</a>
    </header>
    
    <main>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id_peca']; ?></td>
                            <td><?php echo $row['nome_peca']; ?></td>
                            <td><?php echo $row['tipo_peca']; ?></td>
                            <td><?php echo $row['preco_peca']; ?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $row['id_peca']; ?>">Editar</a>
                                <a href="deletar.php?id=<?php echo $row['id_peca']; ?>">Deletar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhuma peça cadastrada.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> - Sistema de Gerenciamento de Peças</p>
    </footer>
</body>
</html>

<?php
 $conn->close();
?>