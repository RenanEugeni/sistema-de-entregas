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
    <h1>Inserir cliente</h1>
    <form action="../controller/insertCliente.php" method="post">
        <h3>Nome:</h3>
        <input type="text" name="nome" id="nome" required>
        <h3>Telefone:</h3>
        <input type="tel" name="telefone" id="telefone" required>
        <h3>E-mail:</h3>
        <input type="email" name="email" id="email" required>
        <h3>CPF/CNPJ:</h3>
        <input type="text" maxlength="14" name="doc" id="doc" required>
        <h3>Endereço:</h3>
        <input type="text" name="endereco" id="endereco" required>
        <h3>Cidade:</h3>
        <input type="text" name="cidade" id="cidade" required>
        <h3>CEP:</h3>
        <input type="text" maxlength="8" name="cep" id="cep" required><br><br>

        <input type="submit" name="Submit" id="Submit" value="Cadastrar">
    </form>
</center>
</body>
</html>