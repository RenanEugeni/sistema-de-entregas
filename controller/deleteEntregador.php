<?php
include 'controll.php';
$controll = new Controll;

$id = $_GET['id'];

$tabela = 2;
$result = $controll->apagar($id, $tabela);

if($result){
    header('Location: ../view/viewEntregadores.php');
}else{
   echo "Falha ao deletar";
}
?>