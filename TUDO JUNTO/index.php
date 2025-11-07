<?php
$conn = new mysqli("localhost","root","senaisp","livraria");
$result = $conn->query("SELECT * FROM usuarios");

echo "<div class='forma'>";
echo "<h2>Usuários</h2>";
echo "<table border = '1'>";
echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Ação 1</th><th>Ação 2</th></tr>";

while ($row = $result->fetch_assoc()){
    echo "<tr>
            <td>{$row['id_usu']}</td>
            <td>{$row['nome']}</td>
            <td>{$row['email']}</td>
            <td><a href='editar.php?id={$row['id_usu']}'>Editar</a></td>
            <td><a href='deletar.php?id={$row['id_usu']}'>Excluir</a></td>
        </tr>";
    }
echo "</table>";

$conn->close();


?>

<a href="index.html"><button type="button">Página
Inicial</button></a>
</div>

<style>
    body{
        top: 0;
        margin: 0;
        padding: 0;
        background-color: aquamarine;
        display: flex;
        justify-content: center;
    }

    div.forma{
        display: flex;
        flex-direction: column;
        text-align: center;
        margin-top: 100px;
    }
    table{
        width: 600px;
        background-color: aliceblue;
        border: 1px solid black;
    }
    button{
        width: 200px;
        border: 1px solid transparent;
        border-radius: 4px;
        box-shadow: 0 0 4px #828282;
        margin-top: 20px;
        transition: border 0.4s ease, box-shadow 0.3s ease, transform 0.4s ease;
        }
    button:hover{
        box-shadow: 0 0 10px #828282;
        transform: translateY(-2px);
        }
</style>