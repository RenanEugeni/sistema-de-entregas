<?php
include 'controll.php';
$controll = new Controll;

$id = $_GET['id'];

$result = $controll->setDelivered($id);

if($result){
    header('Location: ../view/viewEncomendas.php');
}else{
   echo "Falha ao atualizar";
}
?>