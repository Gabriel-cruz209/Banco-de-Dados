<?php
$conn = new mysqli("localhost", "root","senaisp", "mecanica");
if($conn->connect_error) exit("Erro de conexão");

// Consultar os serviços cadastrados
$sql = "SELECT * FROM Servico";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Serviços</title>
    <link rel="stylesheet" href="../../public/assets/css/global.css">
</head>
<body>
    <header>
        <h1>Serviços Cadastrados</h1>
        <a href="inserir.php">Adicionar Novo Serviço</a>
    </header>
    
    <main>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Serviço</th>
                        <th>Tipo de Serviço</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nome_servico']; ?></td>
                            <td><?php echo $row['tipo_servico']; ?></td>
                            <td><?php echo $row['preco_servico']; ?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>
                                <a href="deletar.php?id=<?php echo $row['id']; ?>">Deletar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum serviço cadastrado.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Sua Empresa. Todos os direitos reservados.</p>
    </footer>
</body>
</html>

<?php 
// Fechar a conexão
$conn->close();
?>