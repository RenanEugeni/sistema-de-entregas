<?php 
include '../controller/controll.php';

$controll = new Controll;

$result = $controll->selectEncomendas();
?>
<html>
    <head><title>Homepage</title></head>
</html>

<body>
    <center>
        <h1>Consultar dados cadastrados</h1>
    </center>
    <a href="inicio.html">Voltar</a>
    <a href="addDestino.php">Adicionar novos dados</a><br><br>

    <table width="80%" border="0" align="center">
        <tr bgcolor='#CCCCCC'>
            <Td>Código</Td>
            <Td>Destinatario</Td>
            <td>Endereço de entrega</td>
            <Td>Remetente</Td>
            <Td>Peso</Td>
            <td>Volume</td>
            <td>Quantidade</td>
            <td>Entregador</td>
            <td>Situação</td>
            <Td>Ações</Td>
        </tr>
        <?php
            foreach($result as $key => $res){
                echo "<tr>";
                echo "<td>" . $res['id'] . "</td>";
                echo "<td>" . $res['destinatario'] . "</td>";
                echo "<td>" . $res['endereco'] . "</td>";
                echo "<td>" . $res['remetente'] . "</td>";
                echo "<td>" . $res['peso'] . "</td>";
                echo "<td>" . $res['volume'] . "</td>";
                echo "<td>" . $res['quantidade'] . "</td>";
                echo "<td>" . $res['entregador'] . "</td>";
                echo "<td>" . $res['situacao'] . "</td>";
                echo "<td>| <a href='../controller/deletEntrega.php?id=$res[id]'> Deletar </a> | <a href='../controller/entregue.php?id=$res[id]'> Entregue </a>";
            }
        ?>
    </table>
</body>