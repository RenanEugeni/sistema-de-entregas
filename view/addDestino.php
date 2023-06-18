<?php 
include '../controller/controll.php';

$controll = new Controll;

$clientes = $controll->selectbyTable(1);
?>
<html>
    <head><title>Homepage</title></head>
</html>

<body>
    <center>
        <h1>Consultar dados cadastrados</h1>
    </center>
    <a href="inicio.html">Voltar</a>
    <form action="addEncomenda.php" method="get">
       Selecione o remetente
            <?php
            if (empty($_GET['id'])) {
                echo '
                <select name="reme" id="reme">
                ';
                foreach ($clientes as $key => $clie) {
                    echo '<option value="' . $clie['id'] . '">' . $clie['nome'] . '</option>';
                }
                echo '</select><br><br>';
            } else {
                $id = $_GET['id'];
                echo 'Id remetente: <input type="text" name="remetente" id="remetente" value="' . $id . '">';
            }
            ?>
             <br>
            <label for="destinatario">Selecione o destinatario: </label>
            <select name="dest" id="dest">
                <?php
                foreach ($clientes as $key => $clie) {
                    echo '<option value="' . $clie['id'] . '">' . $clie['nome'] . '</option>';
                }
                ?>
            </select><br><br>
            <input type="submit" value="Continuar">
            </form>
    </table>
</body>