<?php 
include '../controller/controll.php';

$controll = new Controll;

$result = $controll->selectbyTable(2);
?>
<html>
    <head><title>Homepage</title></head>
</html>

<body>
    <center>
        <h1>Consultar dados cadastrados</h1>
    </center>
    <a href="inicio.html">Voltar</a>
    <a href="insertEntregador.php">Adicionar novos dados</a><br><br>

    <table width="80%" border="0" align="center">
        <tr bgcolor='#CCCCCC'>
            <Td>Código</Td>
            <Td>Nome</Td>
            <Td>Telefone</Td>
            <Td>Email</Td>
            <td>veiculo</td>
            <Td>Ações</Td>
        </tr>
        <?php
            foreach($result as $key => $res){
                echo "<tr>";
                echo "<td>" . $res['id'] . "</td>";
                echo "<td>" . $res['nome'] . "</td>";
                echo "<td>" . $res['telefone'] . "</td>";
                echo "<td>" . $res['email'] . "</td>";
                echo "<td>" . $res['veiculo'] . "</td>";
                echo "<td>|<a href='editaEntregador.php?id=$res[id]'>Editar </a> | <a href='../controller/deleteEntregador.php?id=$res[id]'> Deletar </a></td>";
            }
        ?>
    </table>
</body>