<?php
include 'include.php';
$controll = new Controll;

$id = $_GET['id'];

$tabela = 'entregadores';
$result = $controll->apagar($id, $tabela);

if($result){
    header('Location: viewEntregadores.php');
}else{
   echo "Falha ao deletar";
}
?>