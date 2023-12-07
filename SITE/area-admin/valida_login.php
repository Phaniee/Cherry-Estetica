<?php
session_start();

require_once '../dao/UserDao.php'; // Substitua pelo caminho correto

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $user = UserDao::checkCredentials($email, $password);

    if ($user) {
        // Login bem-sucedido
        $_SESSION['AutenticaoAdm'] = "SIM";
        $_SESSION['userAdm'] = $user; // Você pode armazenar informações do usuário na sessão se desejar
        header('Location:home/index.php'); // Ajuste o caminho conforme necessário
        exit();
    } else {
        // Login falhou
        $_SESSION['AutenticaoAdm'] = "NÃO";
        header('Location: login.php?login=erro');
        exit();
    }
} else {
    // Redirecionar se alguém tentar acessar diretamente este arquivo
    header('Location: login.php?login=erro2');
    exit();
}
?>