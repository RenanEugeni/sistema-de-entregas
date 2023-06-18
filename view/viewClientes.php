<?php 
include '../controller/controll.php';

$controll = new Controll;

$result = $controll->selectbyTable(1);
?>
<html>
    <head><title>Homepage</title></head>
</html>

<body>
    <center>
        <h1>Consultar dados cadastrados</h1>
    </center>
    <a href="inicio.html">Voltar</a>
    <a href="insertCliente.php">Adicionar novos dados</a><br><br>

    <table width="80%" border="0" align="center">
        <tr bgcolor='#CCCCCC'>
            <Td>Código</Td>
            <Td>Nome</Td>
            <Td>Telefone</Td>
            <Td>Email</Td>
            <td>CPF/CNPJ</td>
            <td>CEP</td>
            <td>cidade</td>
            <td>endereco</td>
            <Td>Ações</Td>
        </tr>
        <?php
            foreach($result as $key => $res){
                echo "<tr>";
                echo "<td>" . $res['id'] . "</td>";
                echo "<td>" . $res['nome'] . "</td>";
                echo "<td>" . $res['telefone'] . "</td>";
                echo "<td>" . $res['email'] . "</td>";
                echo "<td>" . $res['doc'] . "</td>";
                echo "<td>" . $res['cep'] . "</td>";
                echo "<td>" . $res['cidade'] . "</td>";
                echo "<td>" . $res['endereco'] . "</td>";
                echo "<td>|<a href='editaCliente.php?id=$res[id]'>Editar </a> | <a href='../controller/deleteClientes.php?id=$res[id]'> Deletar </a>|</td>";
            }
        ?>
    </table>
</body>