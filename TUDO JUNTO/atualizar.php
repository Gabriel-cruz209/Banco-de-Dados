<?php
$conn = new mysqli("localhost","root","senaisp","livraria");

$id = $_POST['id_usu'];
$nome = $_POST['nome'];
$email = $_POST['email'];

$sql = "UPDATE usuarios SET nome='$nome', email='$email' WHERE id_usu='$id'";

if($conn->query($sql) === TRUE) {
    echo "<div class='forma'>";
    echo "<p>Dados atualizados com sucesso</p>";
    echo "<br><a href='index.html'>Voltar</a>";
    echo "</div>";
} else {
    echo "Erro: " .  $conn->error;
}

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
    }
    a{
        font-size: 1.2rem;
        text-decoration: none;
    }
    a:hover{
        color: blue;
    }
</style>