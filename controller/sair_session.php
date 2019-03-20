<?php
include_once 'init.php';
// finaliza a sessão (tudo de uma vez)

gravar_log("Usuario deslogou-se");
session_destroy();

//redirecionar o usuario para a página de login
header("Location: ../view/login");
?>