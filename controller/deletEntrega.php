<?php
include 'controll.php';
$controll = new Controll;

$id = $_GET['id'];

$tabela = 3;
$result = $controll->apagar($id, $tabela);

if($result){
    header('Location: ../view/viewEncomendas.php');
}else{
   echo "Falha ao deletar";
}
?>