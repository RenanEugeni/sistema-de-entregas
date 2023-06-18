<?php
include 'include.php';
$controll = new Controll;

$id = $_GET['id'];

$tabela = 'clientes';
$result = $controll->apagar($id, $tabela);

if($result){
    header('Location: viewClientes.php');
}else{
   echo "Falha ao deletar";
}
?>