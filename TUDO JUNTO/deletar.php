<?php
$conn = new mysqli("localhost","root","senaisp","livraria");

if($conn->connect_error) {
    die("Erro de conexão: ". $conn->connect_error);
}

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM usuarios WHERE id_usu = ?");
$stmt->bind_param("i", $id);


if($stmt->execute()) {
    echo "<div class='forma'>";
    echo"<p>Usuário deletado com sucesso!</p>";
} else {
    echo"<p>Erro o deletar: </p>". $stmt->error;
}
echo"<br><a href='index.php'>Voltar para a lista</a>";
echo"</div>";
$stmt->close();
$conn->close();

?>

<style>
    body
        {
        background-color: aqua;
        top: 0;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    p{
        font-size: 2rem;
    }
    .forma{
        display: flex;
        flex-direction: column;
        margin-top: 50px;
    }
    a{
        font-size: 1.2rem;
        text-decoration: none;
    }
    a:hover{
        color: blue;
    }
</style>