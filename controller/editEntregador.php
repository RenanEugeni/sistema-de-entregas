<?php
include 'controll.php';
$controll = new Controll;

$result = $controll->atualizarEntregador();

if($result){
    header('Location: ../view/viewEntregadores.php');
}else{
   echo "Falha ao deletar";
}
?>