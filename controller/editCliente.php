<?php
include 'controll.php';
$controll = new Controll;

$result = $controll->atualizarCliente();


if($result){
    header('Location: ../view/viewClientes.php');
}else{
   echo "Falha ao deletar";
}
?>