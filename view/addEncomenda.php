<?php
include '../controller/controll.php';
$controll = new Controll();

$entregadores = $controll->selectbyTable(2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entregas</title>
</head>
<body>
    <a href="inicio.html">Voltar</a>
    <center>
        <h1>Adicionar entrega</h1>
        <form action="../controller/inicializaentrega.php" method="post">
       ID remetente
            <input type="text" name="remetente" id="remetente" value="<?php echo $_GET['reme'];?>">
             <br>
             ID destinatario: 
            <input type="text" name="destinatario" id="destinatario" value="<?php echo $_GET['dest'];?>">
            </select><br><br>

            <label for="entregador"> Entregador: </label>
            <select name="entregador" id="entregador">
                <?php
                foreach ($entregadores as $key => $ent) {
                    echo '<option value="' . $ent['id'] . '">' . $ent['nome'] . '|' . $ent['veiculo'] . '</option>';
                }
                ?>
            </select><br><br>

            <h2>Adicione o peso em gramas</h2>
            <input type="number" step="any" name="peso" id="peso" required>

            <h2>Adicione o volume em cm³</h2>
            <input type="number" step="any" name="volume" id="volume" required>

            <h2>Coloque a quantidade de itens</h2>
            <input type="number" name="quantidade" id="quantidade" required><br><br>

            <input type="submit" name="Submit" id="Submit" value="Cadastrar">
        </form>
    </center>
</body>
</html>
