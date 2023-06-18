<?php
 include '../controller/controll.php';

  $controll = new Controll;

  $result = $controll->selectByid($_GET['id'], 2);
  foreach($result as $key => $res){
    $id = $res['id'];
    $nome = $res['nome'];
    $telefone = $res['telefone'];
    $email = $res['email'];
    $veiculo = $res['veiculo'];
}
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
    <a href="viewEntregadores.php">Voltar</a>
<center>
    <h1>Inserir entregador</h1>
    <form action="../controller/editEntregador.php" method="post">
    <input type="text" name="id" id="id" value="<?php echo $id;?>" readonly>
        <h3>Nome:</h3>
        <input type="text" name="nome" id="nome" value="<?php echo $nome;?>" required>
        <h3>Telefone:</h3>
        <input type="tel" name="telefone" id="telefone" value="<?php echo $telefone;?>" required>
        <h3>E-mail:</h3>
        <input type="email" name="email" id="email" value="<?php echo $email;?>" required>
        <h3>Veiculo:</h3>
        <input type="radio" id="veiculo" name="veiculo" value="<?php echo $veiculo;?>" checked="checked"><?php echo $veiculo;?><br>
        <input type="radio" id="veiculo" name="veiculo" value="moto">Moto<br>
        <input type="radio" id="veiculo" name="veiculo" value="carro">Carro<br>
        <input type="radio" id="veiculo" name="veiculo" value="caminhao">Caminhão     
        <br><br>

        <input type="submit" name="Submit" id="Submit" value="Alterar">
    </form>
</center>
</body>
</html>