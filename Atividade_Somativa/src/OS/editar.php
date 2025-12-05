<?php 

$conn = new mysqli("localhost", "root","senaisp", "mecanica");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Função para buscar opções para os select boxes
function getOptions($conn, $table, $idCol, $nameCol) {
    $options = [];
    $sql = "SELECT $idCol, $nameCol FROM $table ORDER BY $nameCol";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $options[] = $row;
        }
    }
    return $options;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Bloco POST (Ação de Update) - O id do POST agora se chama 'id_os'
    
    $id_os = $_POST['id_os']; // Recebe o ID da OS a ser editada

    $preco_os       = $_POST['preco_os'];
    $data_inicio_os = $_POST['data_inicio_os'];
    $descricao_os   = $_POST['descricao_os'];
    $data_termino_os= $_POST['data_termino_os'];

    $id_cliente  = $_POST['id_cliente'];
    $id_peca     = $_POST['id_peca'];
    $id_mecanico = $_POST['id_mecanico'];
    $id_servico  = $_POST['id_servico'];
    $id_veiculo  = $_POST['id_veiculo'];

    $stmt = $conn->prepare("
        UPDATE OS 
        SET preco_os=?, data_inicio_os=?, descricao_os=?, data_termino_os=?,
            id_cliente=?, id_peca=?, id_mecanico=?, id_servico=?, id_veiculo=?
        WHERE id_os=?
    ");

    // CORRIGIDO: String de tipos deve ser "dsssiiiiii" (10 tipos)
    $stmt->bind_param(
        "dsssiiiiii", // Corrigido
        $preco_os,
        $data_inicio_os,
        $descricao_os,
        $data_termino_os,
        $id_cliente,
        $id_peca,
        $id_mecanico,
        $id_servico,
        $id_veiculo,
        $id_os
    );

    if ($stmt->execute()) {
        echo "Ordem de serviço atualizada!";
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
    
} 
// Bloco GET (Exibição do Formulário)
if ($_SERVER['REQUEST_METHOD'] == 'GET' || (isset($id_os) && $stmt->execute())) {

    $id = $_GET['id'] ?? $id_os; // Usa o ID do GET ou o ID que acabou de ser atualizado (se houver)

    $stmt = $conn->prepare("SELECT * FROM OS WHERE id_os = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $os = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    
    // Busca as opções de nome/descrição das tabelas de referência
    $clientes  = getOptions($conn, "Cliente", "id_cliente", "nome_cliente");
    $veiculos  = getOptions($conn, "Veiculo", "id_veiculo", "modelo_veiculo");
    $mecanicos = getOptions($conn, "Mecanico", "id_mecanico", "nome_mecanico");
    $servicos  = getOptions($conn, "Servico", "id_servico", "descricao_servico");
    $pecas     = getOptions($conn, "Peca", "id_peca", "nome_peca");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar OS</title>
</head>

<body>

<h1>Editar Ordem de Serviço</h1>

<form action="editar.php" method="POST">

    <input type="hidden" name="id_os" value="<?php echo $os['id_os']; ?>">

    <label>Cliente:</label>
    <select name="id_cliente" required>
        <?php foreach ($clientes as $c) {
            $selected = ($c['id_cliente'] == $os['id_cliente']) ? 'selected' : '';
            echo "<option value='{$c['id_cliente']}' $selected>{$c['nome_cliente']}</option>";
        } ?>
    </select><br><br>

    <label>Veículo:</label>
    <select name="id_veiculo" required>
        <?php foreach ($veiculos as $v) {
            $selected = ($v['id_veiculo'] == $os['id_veiculo']) ? 'selected' : '';
            echo "<option value='{$v['id_veiculo']}' $selected>{$v['modelo_veiculo']}</option>";
        } ?>
    </select><br><br>

    <label>Mecânico:</label>
    <select name="id_mecanico" required>
        <?php foreach ($mecanicos as $m) {
            $selected = ($m['id_mecanico'] == $os['id_mecanico']) ? 'selected' : '';
            echo "<option value='{$m['id_mecanico']}' $selected>{$m['nome_mecanico']}</option>";
        } ?>
    </select><br><br>

    <label>Serviço:</label>
    <select name="id_servico" required>
        <?php foreach ($servicos as $s) {
            $selected = ($s['id_servico'] == $os['id_servico']) ? 'selected' : '';
            echo "<option value='{$s['id_servico']}' $selected>{$s['descricao_servico']}</option>";
        } ?>
    </select><br><br>

    <label>Peça:</label>
    <select name="id_peca" required>
        <?php foreach ($pecas as $p) {
            $selected = ($p['id_peca'] == $os['id_peca']) ? 'selected' : '';
            echo "<option value='{$p['id_peca']}' $selected>{$p['nome_peca']}</option>";
        } ?>
    </select><br><br>

    <label>Preço:</label>
    <input type="text" name="preco_os" value="<?php echo $os['preco_os']; ?>"><br><br>

    <label>Data Início:</label>
    <input type="date" name="data_inicio_os" value="<?php echo $os['data_inicio_os']; ?>"><br><br>

    <label>Descrição:</label>
    <textarea name="descricao_os"><?php echo $os['descricao_os']; ?></textarea><br><br>

    <label>Data Término:</label>
    <input type="date" name="data_termino_os" value="<?php echo $os['data_termino_os']; ?>"><br><br>

    <button type="submit">Atualizar</button>

</form>

</body>
</html>

<?php 
} // Fecha o bloco GET/Exibição
$conn->close(); 
?>