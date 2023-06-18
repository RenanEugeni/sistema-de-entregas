<?php
include 'controll.php';
$controll = new Controll();
$result = $controll->inicializarEntrega();
header('Location: ../view/viewEncomendas.php');
?>