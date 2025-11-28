<?php 
$conn = new mysqli("localhost", "root", "senaisp", "mecanica");
if ($conn->connect_error) exit("Erro de conexão");

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
                            <td>{$row['id_os']}</td>
                            <td>{$row['preco_os']}</td>
                            <td>{$row['data_inicio_os']}</td>
                            <td>{$row['descricao_os']}</td>
                            <td>{$row['data_termino_os']}</td>
                            <td>
                                <a href='editar.php?id={$row['id_os']}'>Editar</a>
                                <a href='deletar.php?id={$row['id_os']}'>Deletar</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhuma ordem de serviço encontrada.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="index.html">Adicionar Nova Ordem de Serviço</a>
</div>

