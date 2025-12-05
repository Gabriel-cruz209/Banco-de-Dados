<?php
$conn = new mysqli("localhost", "root", "senaisp", "mecanica");
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Funções para buscar opções de todas as tabelas (confirmadas pelo SQL)
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

$clientes  = getOptions($conn, "Cliente", "id_cliente", "nome_cliente");
$veiculos  = getOptions($conn, "Veiculo", "id_veiculo", "modelo_veiculo");
$mecanicos = getOptions($conn, "Mecanico", "id_mecanico", "nome_mecanico");
$servicos  = getOptions($conn, "Servico", "id_servico", "descricao_servico");
$pecas     = getOptions($conn, "Peca", "id_peca", "nome_peca");

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <title>OS</title>
    <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <header>
      <h1>Bem-vindo à Somativa Mecânica</h1>
      <nav>
        <ul>
          <li><a href="/Cliente/index.html">Clientes </a></li>
          <li><a href="/Mecanico/index.html">Mecânicos</a></li>
          <li><a href="/Veiculo/index.html">Veículos</a></li>
          <li><a href="/Servico/index.html">Serviços</a></li>
          <li><a href="/Peca/index.html">Peças</a></li>
          <li><a href="/OS/index.html">Ordens de Serviço</a></li>
        </ul>
      </nav>
    </header>

    <div class="container">
      <h1>OS</h1>

      <h2>Inserir Ordem de Serviço</h2>

      <form method="post" action="inserir.php">

        <label>Cliente:<br>
          <select name="id_cliente" required>
            <option value="">Selecione um Cliente</option>
            <?php foreach ($clientes as $c) {
                echo "<option value='{$c['id_cliente']}'>{$c['nome_cliente']}</option>";
            } ?>
          </select>
        </label><br><br>

        <label>Veículo:<br>
          <select name="id_veiculo" required>
            <option value="">Selecione um Veículo</option>
            <?php foreach ($veiculos as $v) {
                echo "<option value='{$v['id_veiculo']}'>{$v['modelo_veiculo']}</option>";
            } ?>
          </select>
        </label><br><br>

        <label>Mecânico:<br>
          <select name="id_mecanico" required>
            <option value="">Selecione um Mecânico</option>
            <?php foreach ($mecanicos as $m) {
                echo "<option value='{$m['id_mecanico']}'>{$m['nome_mecanico']}</option>";
            } ?>
          </select>
        </label><br><br>

        <label>Serviço:<br>
          <select name="id_servico" required>
            <option value="">Selecione um Serviço</option>
            <?php foreach ($servicos as $s) {
                echo "<option value='{$s['id_servico']}'>{$s['descricao_servico']}</option>";
            } ?>
          </select>
        </label><br><br>

        <label>Peça:<br>
          <select name="id_peca" required>
            <option value="">Selecione uma Peça</option>
            <?php foreach ($pecas as $p) {
                echo "<option value='{$p['id_peca']}'>{$p['nome_peca']}</option>";
            } ?>
          </select>
        </label><br><br>

        <label>Preço:<br>
          <input type="number" name="preco_os" step="0.01" required>
        </label><br><br>

        <label>Data Início:<br>
          <input type="date" name="data_inicio_os" required>
        </label><br><br>

        <label>Descrição:<br>
          <textarea name="descricao_os" rows="3"></textarea>
        </label><br><br>

        <label>Data Término:<br>
          <input type="date" name="data_termino_os">
        </label><br><br>

        <button type="submit">Inserir OS</button>
      </form>
    </div>
  </body>
</html>