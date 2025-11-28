<?php 
// Incluir o cabeçalho comum
include_once '../shared/header.php';

// Conectar ao banco de dados
include_once '../config/database.php';

// Consultar as ordens de serviço
$sql = "SELECT * FROM OS";
$result = $conn->query($sql);

?>

<div class="container">
    <h1>Lista de Ordens de Serviço</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Preço</th>
                <th>Data de Início</th>
                <th>Descrição</th>
                <th>Data de Término</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['preco_os']}</td>
                            <td>{$row['data_inicio_os']}</td>
                            <td>{$row['descricao_os']}</td>
                            <td>{$row['data_termino_os']}</td>
                            <td>
                                <a href='editar.php?id={$row['id']}'>Editar</a>
                                <a href='deletar.php?id={$row['id']}'>Deletar</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhuma ordem de serviço encontrada.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="inserir.php">Adicionar Nova Ordem de Serviço</a>
</div>

<?php 
// Incluir o rodapé comum
include_once '../shared/footer.php';
?>