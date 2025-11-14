<?php 

$conn = new mysqli("localhost", "root","senaisp", "mecanica");

if($conn->connect_error){
    die("Erro de conexão: ". $conn->connect_error);
}

//CLIENTE

$nome_cliente = $_POST['nome_cliente'];
$email_cliente = $_POST['email_cliente'];
$endereco_cliente = $_POST['endereco_cliente'];
$cpf_cliente = $_POST['cpf_cliente'];
$celular_cliente = $_POST['celular_cliente'];


$sql = "INSERT INTO Cliente(nome_cliente,email_cliente,endereco_cliente,cpf_cliente,celular_cliente) VALUES ('$nome_cliente','$email_cliente','$endereco_cliente','$cpf_cliente','$celular_cliente')";
if ($conn->query($sql) === TRUE) {
    echo"Cliente cadastrado com sucesso!";
} else {
    echo"Erro: ". $conn->error;
}

//VEICULOS

$marca_carro = $_POST['marca_veiculo'];
$modelo_carro = $_POST['modelo_veiculo'];
$ano_carro = $_POST['ano_veiculo'];
$cor_carro = $_POST['cor_veiculo'];
$placa_carro = $_POST['placa_veiculo'];

$sql = "INSERT INTO Veiculo(marca_veiculo,modelo_veiculo,ano_veiculo,cor_veiculo,placa_veiculo) VALUES ('$marca_carro','$modelo_carro','$ano_carro','$cor_carro','$placa_carro')";
if ($conn->query($sql) === TRUE) {
    echo"Cliente cadastrado com sucesso!";
} else {
    echo"Erro: ". $conn->error;
}

//MECANICO

$nome_mecanico = $_POST['nome_mecanico'];
$cpf_mecanico = $_POST['cpf_mecanico'];
$celular_mecanico = $_POST['celular_mecanico'];
$endereco_mecanico = $_POST['endereco_mecanico'];
$email_mecanico = $_POST['email_mecanico'];
$salario_mecanico = $_POST['salario_mecanio'];

$sql = "INSERT INTO Mecanico(nome_mecanico,email_mecanico,endereco_mecanico,cpf_mecanico,celular_mecanico,salario_mecanico) VALUES ('$nome_mecanico','$email_mecanico','$endereco_mecanico','$cpf_mecanico','$celular_mecanico','$salario_mecanico')";
if ($conn->query($sql) === TRUE) {
    echo"Cliente cadastrado com sucesso!";
} else {
    echo"Erro: ". $conn->error;
}

//SERVICO

$nome_servico = $_POST['nome_servico'];
$tipo_servico = $_POST['tipo_servico'];
$preco_servico = $_POST['preco_servico'];
$descricao_servico = $_POST['descricao_servico'];

$sql = "INSERT INTO Servico(nome_servico,tipo_servico,descricao_servico,preco_servico) VALUES ('$nome_servico','$tipo_servico','$preco_servico','$descricao_servico')";
if ($conn->query($sql) === TRUE) {
    echo"Cliente cadastrado com sucesso!";
} else {
    echo"Erro: ". $conn->error;
}

//PECA

$nome_peca = $_POST['nome_peca'];
$tipo_peca = $_POST['tipo_peca'];
$preco_peca = $_POST['preco_peca'];
$descricao_peca = $_POST['descricao_peca'];

$sql = "INSERT INTO Cliente(nome_peca,tipo_peca,preco_peca,descricao_peca) VALUES ('$nome_peca','$tipo_peca','$preco_peca','$descricao_peca')";
if ($conn->query($sql) === TRUE) {
    echo"Cliente cadastrado com sucesso!";
} else {
    echo"Erro: ". $conn->error;
}

//OS

$preco_os = $_POST['preco_os'];
$data_inicio_os = $_POST['data_inicio_os'];
$descricao_os = $_POST['descricao_os'];
$data_termino_os = $_POST['data_termino_os'];

$sql = "INSERT INTO OS(preco_os,data_inicio_os,descricao_os,data_termino_os) VALUES ('$preco_os','$data_inicio_os','$descricao_os','$data_termino_os')";
if ($conn->query($sql) === TRUE) {
    echo"Cliente cadastrado com sucesso!";
} else {
    echo"Erro: ". $conn->error;
}

//POSSUEM




header("Location: index.html");
exit;



$conn->close();
?>
