<?php
session_start();

require_once '../dao/ClienteDao.php'; // Substitua pelo caminho correto

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $cliente = ClienteDao::checkCredentials($email, $password);

    if ($cliente) {
        // Login bem-sucedido
        $_SESSION['Autenticado'] = "SIM";
        $_SESSION['usuario'] = $cliente; // Você pode armazenar informações do usuário na sessão se desejar
        header('Location: home.php'); // Ajuste o caminho conforme necessário
        exit();
    } else {
        // Login falhou
        $_SESSION['Autenticado'] = "NÃO";
        header('Location: login.php?login=erro');
        exit();
    }
} else {
    // Redirecionar se alguém tentar acessar diretamente este arquivo
    header('Location: login.php?login=erro2');
    exit();
}
?>