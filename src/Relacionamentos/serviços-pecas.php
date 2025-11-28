<?php 

$conn = new mysqli("localhost", "root", "senaisp", "mecanica");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Lógica para gerenciar o relacionamento entre serviços e peças

// Exemplo de como inserir um relacionamento
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_servico = $_POST['id_servico'];
    $id_peca = $_POST['id_peca'];
    
    $sql = "INSERT INTO Servico_Peca(id_servico, id_peca) VALUES ('$id_servico', '$id_peca')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Relacionamento entre serviço e peça cadastrado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}

// Exemplo de como listar relacionamentos
$sql = "SELECT sp.id, s.nome_servico, p.nome_peca FROM Servico_Peca sp 
        JOIN Servico s ON sp.id_servico = s.id 
        JOIN Peca p ON sp.id_peca = p.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Serviço</th><th>Peça</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nome_servico"]. "</td><td>" . $row["nome_peca"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}

$conn->close();
?>