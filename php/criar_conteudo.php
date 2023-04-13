<?php
session_start();
include_once('/conexao.php');

// Obtém os dados do formulário
// $nome = $_POST['nome'];
$titulo = $_POST['titulo'];
$conteudo = $_POST['conteudo'];
$nome = $_SESSION['usuario'];
$materia = $_POST['materia'];

// Prepara e executa a query SQL para inserir o novo registro na tabela "usuarios"
$stmt = $pdo->prepare("INSERT INTO conteudos (titulo, conteudo, nome, materia) VALUES (:titulo, :conteudo, :nome, :materia)");

$stmt->bindParam(':titulo', $titulo);
$stmt->bindParam(':conteudo', $conteudo);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':materia', $materia);

// Executa a declaração SQL
if ($stmt->execute()) {
    $mensagem = "Conteudo criado com sucesso.";
} else {
    $mensagem = "Erro ao criar conteudo: " . $stmt->errorInfo()[2];
}


// Cria um formulário oculto para enviar a mensagem por meio do método POST
echo '<form id="redirect-form" method="POST" action="/html/prof/">';
echo '<input type="hidden" name="mensagem" value="' . $mensagem . '">';
echo '</form>';

// Envia a mensagem por meio do formulário oculto e redireciona para a página inicial
echo '<script>document.getElementById("redirect-form").submit();</script>';
?>