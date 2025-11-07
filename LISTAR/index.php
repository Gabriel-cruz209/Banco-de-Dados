<?php
$conn = new mysqli("localhost","root","senaisp","livraria");
$result = $conn->query("SELECT * FROM usuarios");

echo "<h2>Usuários</h2>";
echo "<table border = '1'>";
echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Ações</th></tr>";

while ($row = $result->fetch_assoc()){
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['nome']}</td>
            <td>{$row['email']}</td>
            <td><a href='editar.php?id={$row['id']}'>Editar</a></td>
        </tr>";
    }
echo "</table>";
$conn->close();


?>

<a href="index.html"><button type="button">Página
Inicial</button></a>

<style>
    body{
        top: 0;
        margin: 0;
        padding: 0;
        background-color: aquamarine;
        display: flex;
        justify-content: center;
    }
</style>