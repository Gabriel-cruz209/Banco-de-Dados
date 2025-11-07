<?php
$conn = new mysqli("localhost","root","senaisp","livraria");

$id = $_GET['id_usu'];
$result=$conn->query("SELECT * FROM usuarios WHERE id_usu = $id_usu");
$row = $result->fetch_assoc();

?>

<form action="atualizar.php" method="POST">
    <input type="hidden" name="id_usu" value="<?php echo $row['id_usu'];?>">
    Nome: <input type="text" name="nome" value="<?php echo $row['nome']; ?>"><br>
    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"><br>
    <input type="submit" value="Atualizar">
</form>