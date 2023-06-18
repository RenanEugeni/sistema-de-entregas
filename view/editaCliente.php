<?php
 include '../controller/controll.php';

  $controll = new Controll;

  $result = $controll->selectByid($_GET['id'], 1);
  foreach($result as $key => $res){
    $id = $res['id'];
    $nome = $res['nome'];
    $telefone = $res['telefone'];
    $email = $res['email'];
    $doc = $res['doc'];
    $cep = $res['cep'];
    $cidade = $res['cidade'];
    $endereco = $res['endereco'];
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
    <a href="viewClientes.php">Voltar</a>
<center>
    <h1>Editar cliente</h1>
    <form action="../controller/editCliente.php" method="post">
        <input type="text" name="id" id="id" value="<?php echo $id;?>" readonly>
        <h3>Nome:</h3>
        <input type="text" name="nome" id="nome" value="<?php echo $nome;?>"  required>
        <h3>Telefone:</h3>
        <input type="tel" name="telefone" id="telefone" value="<?php echo $telefone;?>" required>
        <h3>E-mail:</h3>
        <input type="email" name="email" id="email" value="<?php echo $email;?>" required>
        <h3>CPF/CNPJ:</h3>
        <input type="text" maxlength="14" name="doc" id="doc" value="<?php echo $doc;?>" required>
        <h3>Endereço:</h3>
        <input type="text" name="endereco" id="endereco" value="<?php echo $endereco;?>" required>
        <h3>Cidade:</h3>
        <input type="text" name="cidade" id="cidade" value="<?php echo $cidade;?>" required>
        <h3>CEP:</h3>
        <input type="text" maxlength="8" name="cep" id="cep" value="<?php echo $cep;?>" required><br><br>

        <input type="submit" name="Submit" id="Submit" value="Alterar">
    </form>
</center>
</body>
</html>