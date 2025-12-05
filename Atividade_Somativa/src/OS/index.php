<?php 
$conn = new mysqli("localhost", "root", "senaisp", "mecanica");
if ($conn->connect_error) exit("Erro de conexão");

// ALTERADO: Adicionado JOIN para buscar os nomes
$sql = "SELECT 
            OS.*,
            C.nome_cliente,
            V.modelo_veiculo, 
            M.nome_mecanico,
            S.descricao_servico,
            P.nome_peca
        FROM OS
        JOIN Cliente C ON OS.id_cliente = C.id_cliente
        JOIN Veiculo V ON OS.id_veiculo = V.id_veiculo
        JOIN Mecanico M ON OS.id_mecanico = M.id_mecanico
        JOIN Servico S ON OS.id_servico = S.id_servico
        JOIN Peca P ON OS.id_peca = P.id_peca"; 
        
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
                <th>Cliente</th>
                <th>Peça</th>
                <th>Mecânico</th>
                <th>Serviço</th>
                <th>Veículo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    echo "<tr>
                            <td>{$row['id_os']}</td>
                            <td>{$row['preco_os']}</td>
                            <td>{$row['data_inicio_os']}</td>
                            <td>{$row['descricao_os']}</td>
                            <td>{$row['data_termino_os']}</td>
                            <td>{$row['nome_cliente']}</td>
                            <td>{$row['nome_peca']}</td>
                            <td>{$row['nome_mecanico']}</td>
                            <td>{$row['descricao_servico']}</td>
                            <td>{$row['modelo_veiculo']}</td>
                            <td>
                                <a href='editar.php?id={$row['id_os']}'>Editar</a>
                                <a href='deletar.php?id={$row['id_os']}'>Deletar</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='11'>Nenhuma ordem de serviço encontrada.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a href='index1.php'>Adicionar Nova Ordem de Serviço</a> 
</div>