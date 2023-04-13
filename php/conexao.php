<?php
$db_file = __DIR__ . './../data/FTEC.sqlite';
// Conecta ao banco de dados
try {
    $pdo = new PDO("sqlite:$db_file");
} catch (PDOException $e) {
    echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
    exit();
}

// Cria o banco de dados local, as tabelas e dados iniciais
include('/cria_banco.php');
?>