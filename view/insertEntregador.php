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
    <h1>Inserir entregador</h1>
    <form action="../controller/insertEntregador.php" method="post">
        <h3>Nome:</h3>
        <input type="text" name="nome" id="nome" required>
        <h3>Telefone:</h3>
        <input type="tel" name="telefone" id="telefone" required>
        <h3>E-mail:</h3>
        <input type="email" name="email" id="email" required>
        <h3>Veiculo:</h3>
        <input type="radio" id="veiculo" name="veiculo" value="moto" required>Moto<br>
        <input type="radio" id="veiculo" name="veiculo" value="carro" required>Carro<br>
        <input type="radio" id="veiculo" name="veiculo" value="caminhao" required>Caminhão     
        <br><br>

        <input type="submit" name="Submit" id="Submit" value="Cadastrar">
    </form>
</center>
</body>
</html>