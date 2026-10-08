<?php

include("db.php");

$especie = trim($_GET["especie"] ?? "");
$porte = trim($_GET["porte"] ?? "");

if ($especie !== "" && $porte !== "") {
    $sql = "SELECT * FROM animais WHERE especie = ? AND porte = ? ORDER BY id DESC";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ss", $especie, $porte);
    $stmt->execute();
    $resultado = $stmt->get_result();
} elseif ($especie !== "") {
    $sql = "SELECT * FROM animais WHERE especie = ? ORDER BY id DESC";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $especie);
    $stmt->execute();
    $resultado = $stmt->get_result();
} elseif ($porte !== "") {
    $sql = "SELECT * FROM animais WHERE porte = ? ORDER BY id DESC";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $porte);
    $stmt->execute();
    $resultado = $stmt->get_result();
} else {
    $sql = "SELECT * FROM animais ORDER BY id DESC";
    $resultado = $conexao->query($sql);
}

$quantidade = $resultado ? $resultado->num_rows : 0;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animais para Adoção - Patinhas Felizes</title>
     <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>🐾 Patinhas Felizes</h1>
        <p>Encontre seu novo melhor amigo</p>
    </header>

    <nav>
        <a href="index.php">Início</a>
        <a href="cadastrar.php">Cadastrar Animal</a>
        <a href="listar.php">Animais para Adoção</a>
    </nav>

    <div class="container">
        <h2>Animais Disponíveis para Adoção</h2>

        <div class="grid">
           <table>
  
        <tr>
            
            <th>Nome</th>
            <th>Espécie</th>
            <th>Idade</th>
            <th>Porte</th>
            <th>Descrição</th>
            
        </tr>
    

        <!-- AQUI ESCREVER O CÓDIGO EM PHP QUE BUSCA OS ANIMAIS NO BANCO E DADOS E EXIBE NAS LINHAS E COLUNAS DA TABELA -->

</table>

        </div>
    </div>

    <footer>
        <p>&copy; 2026 Patinhas Felizes - Programação Web 2 | Curso Técnico em Informática | IFBA Campus Ilhéus</p>
    </footer>

</body>
</html>
