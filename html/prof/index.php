<?php
    session_start();
if (isset($_POST['mensagem'])) {
    echo '<script>alert("' . $_POST['mensagem'] . '");</script>';
}

include('../../php/lista_materias.php')
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/prof.css">
    <link rel="stylesheet" href="../../css/geral.css">
    <title><?php echo $_SESSION['usuario']; ?></title>
</head>

<body>
    <header>
        <h1><?php echo 'Bem-vindo, ' . $_SESSION['usuario'] . '!'; ?></h1>
    </header>
    <main>
        <section class="section">
            <form action='../../php/criar_conteudo.php' method="post">
                <h2>Cadastrar um novo conteudo</h2><br>
                <select name="materia" id="materia" required>
                    <?php foreach ($materias as $materia): ?>
                        <option value="<?php echo $materia['materia']; ?>"><?php echo $materia['materia']; ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="titulo">Titulo</label><br>
                <input type="text" name="titulo" value=""><br>
                <label for="conteudo">Conteúdo</label><br>
                <textarea name="conteudo"></textarea><br>
                <input type="submit" value="Cadastrar Conteúdo">
            </form>
        </section>
        <section class="section">
            <form action='../../php/criar_evento.php' method="post">
                <label for="data_evento">Data:</label>
                <input type="date" name="data_evento" id="data">

                <label for="titulo_do_evento">Titulo do evento</label>
                <input type="text" name="titulo_do_evento" id="titulo_do_evento">

                <label for="campo_de_descricao">Campo de descrição</label>
                <textarea name="campo_de_descricao"></textarea>
                
                <input type="submit" value="Salvar evento">
                
            </form>
        </section>
    </main>

</body>

</html>