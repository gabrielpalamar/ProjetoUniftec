<?php
session_start();
include_once('/conexao.php');

date_default_timezone_set('America/Sao_Paulo');
$data_atual = strtotime(date('Y-m-d'));

$data = $_POST ['data_evento'];
$titulo = $_POST ['titulo_do_evento'];
$descricao = $_POST ['campo_de_descricao'];
$usuario = $_SESSION ['usuario'];

if(!$data || !$titulo || !$descricao || !$usuario){
    die("Por favor, preencha todos os campos");
} 

list($ano,$mes,$dia) = explode ('-', $data);

if(strtotime($data)<=$data_atual){
    // data do evento é anterior à data atual
    echo '<script>alert("A data do evento deve ser maior ou igual à data atual."); window.history.back();</script>';
    die();
}

$stmt = $pdo->prepare('INSERT INTO eventos(ano, mes, dia, titulo, descricao, usuario) VALUES (?,?,?,?,?,?)');
$stmt -> execute([$ano,$mes,$dia,$titulo,$descricao,$usuario]);

if($stmt->rowCount() > 0){
    // Evento cadastrado com sucesso
    echo '<script>alert("Evento cadastrado com sucesso!"); window.history.back();</script>';
} else {
    // Ocorreu um erro ao cadastrar o evento
    echo '<script>alert("Ocorreu um erro ao cadastrar o evento. Tente novamente mais tarde."); window.history.back();</script>';
}

?>