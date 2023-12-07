<?php 
//Inicar a sessão
session_start();
//Verificar se o indice autenticado existe ou é igual a NÂO
if(!isset($_SESSION['Autenticado']) || $_SESSION['Autenticado']!='SIM'){
  //mandar para o index com um erro2
  header('Location:login.php?login=erro2');
}
?>