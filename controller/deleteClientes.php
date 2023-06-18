<?php
include 'controll.php';
$controll = new Controll;

$id = $_GET['id'];

$tabela = 1;
$result = $controll->apagar($id, $tabela);

if($result){
    header('Location: ../view/viewClientes.php');
}else{
   echo "Falha ao deletar";
}
?>