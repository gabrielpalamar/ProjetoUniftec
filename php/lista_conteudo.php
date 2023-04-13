<?php
include('/conexao.php');


// Obtém o valor selecionado no campo "materia"
$materia = $_GET['materia'];

// Constrói a consulta SQL com uma cláusula WHERE para filtrar os resultados pela matéria selecionada
$stmt = $pdo->prepare("SELECT * FROM conteudos WHERE materia = :materia");
$stmt->bindParam(':materia', $materia);

$stmt->execute();
?>