<?php
// Inclui o cabeçalho comum
include_once '../shared/header.php';

// Conexão com o banco de dados
include_once '../config/database.php';

// Consulta para obter a lista de veículos
$sql = "SELECT * FROM Veiculo";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Lista de Veículos</h1>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Marca</th><th>Modelo</th><th>Ano</th><th>Cor</th><th>Placa</th><th>Ações</th></tr>";
    
    // Exibe os dados de cada veículo
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['marca_veiculo'] . "</td>";
        echo "<td>" . $row['modelo_veiculo'] . "</td>";
        echo "<td>" . $row['ano_veiculo'] . "</td>";
        echo "<td>" . $row['cor_veiculo'] . "</td>";
        echo "<td>" . $row['placa_veiculo'] . "</td>";
        echo "<td>
                <a href='editar.php?id=" . $row['id'] . "'>Editar</a>
                <a href='deletar.php?id=" . $row['id'] . "'>Deletar</a>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum veículo encontrado.";
}

// Inclui o rodapé comum
include_once '../shared/footer.php';
?>