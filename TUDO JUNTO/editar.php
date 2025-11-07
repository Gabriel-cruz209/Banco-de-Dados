<?php
$conn = new mysqli("localhost","root","senaisp","livraria");

$id = $_GET['id'];
$result=$conn->query("SELECT * FROM usuarios WHERE id_usu = '$id'");
$row = $result->fetch_assoc();

?>

<form action="atualizar.php" method="POST">
    <input type="hidden" name="id_usu" value="<?php echo $row['id_usu'];?>">
    Nome: <input type="text" name="nome" value="<?php echo $row['nome']; ?>"><br>
    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"><br>
    <input type="submit" value="Atualizar">
</form>

<style>
    body{
            background-color: aqua;
            top: 0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        form{
            display: flex;
            flex-direction: column;
            width: 200px;
            height: auto;
            margin-top: 200px;
        }

        input{
            border: 1px solid transparent;
            border-radius: 7px;
        }
        button{
            border: 1px solid transparent;
            border-radius: 4px;
            box-shadow: 0 0 4px #828282;
            transition: border 0.4s ease, box-shadow 0.3s ease, transform 0.4s ease;
        }
        button:hover{
            box-shadow: 0 0 10px #828282;
            border: 2px solid #656565;
            transform: translateY(-2px);
        }

</style>