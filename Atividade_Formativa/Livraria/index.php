<?php
//CONFIGURAÇÃO BANCO DE DADOS/ COMUNICAÇÃO COM BANCO DE DADOS
$mysql = mysqli_connect('localhost','root','senaisp','livraria');

// SEGURANÇA EM BUSCAR VALORES NO BANCO
$columns = array('titulo','preco','autor');

//TRAZER CONTEUDO DO BANCO
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

//TRAZER DADOS EM ORDEM EDESCRECENTE
$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

// VERIFICAR DADOS NO BANCO
if($result = $mysqli->query("SELECT * FROM Livros ORDER BY '. $column . '' . $sort_order")){
    //VARIAS PARA A TABELA
    $up_or_down = str_replace(array('ASC','DESC'),
    array('up','down'), $sort_order);
    $asc_or_desc = $sort_order == 'ASC' ? 'desc' :
    'asc';
    $add_class = 'class="highlight"';
    ?>

    <!DOCTYPE html>
    <html>
        <head>
            <title> Banco de Dados - Códigos e Letras</title>
            <meta charset="utf-8">
        </head>
        <body>
            <table>
                <tr>
                    <th><a href="index.php?column=titulo&order=<?php echo $asc_or_desc; ?>">TItulo<?php echo $column = 'titulo' ? '-' . $up_or_down : ''; ?></th>
                    <th><a href="index.php?column=preco&order=<?php echo $asc_or_desc; ?>">Preço<?php echo $column = 'preco' ? '-' . $up_or_down : ''; ?></th>
                    <th><a href="index.php?column=autor&order=<?php echo $asc_or_desc; ?>">Autor<?php echo $column = 'autor' ? '-' . $up_or_down : ''; ?></th>
                </tr>
                <?php while ($row = $result->fetch_assoc()):?>
                    <tr>
                        <td<?php echo $column == 'titulo' ? $add_class : ''; ?>> <?php echo $row ['titulo']; ?></td>
                        <td<?php echo $column == 'preco' ? $add_class : ''; ?>> <?php echo $row ['preco']; ?></td>
                        <td<?php echo $column == 'autor' ? $add_class : ''; ?>> <?php echo $row ['autor']; ?></td>
                    </tr>
                <?php endwhile;?>
            </table>
        </body>
    </html>
    <?php $result->free();
}
?>
