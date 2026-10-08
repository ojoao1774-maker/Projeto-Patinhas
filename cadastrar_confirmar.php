<?php

include("db.php");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: cadastrar.php");
    exit;
}

$nome = trim($_POST["nome"] ?? "");
$especie = trim($_POST["especie"] ?? "");
$idade = $_POST["idade"] ?? "";
$porte = trim($_POST["porte"] ?? "");
$descricao = trim($_POST["descricao"] ?? "");

$erros = [];

if ($nome === "") {
    $erros[] = "Informe o nome do animal.";
}

if ($especie === "") {
    $erros[] = "Selecione a espécie.";
}

if ($idade === "" || !is_numeric($idade) || (int)$idade < 0) {
    $erros[] = "Informe uma idade válida.";
}

if ($porte === "") {
    $erros[] = "Selecione o porte.";
}

if ($descricao === "") {
    $erros[] = "Informe uma descrição do animal.";
}

if (empty($erros)) {
    $idade = (int)$idade;

    $sql = "INSERT INTO animais (nome, especie, idade, porte, descricao)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssiss", $nome, $especie, $idade, $porte, $descricao);

        if ($stmt->execute()) {
            $mensagem = "Animal cadastrado com sucesso!";
            $sucesso = true;
        } else {
            $mensagem = "Erro ao cadastrar o animal: " . $stmt->error;
            $sucesso = false;
        }

        $stmt->close();
    } else {
        $mensagem = "Erro ao preparar o cadastro: " . $conexao->error;
        $sucesso = false;
    }
} else {
    $mensagem = implode("<br>", $erros);
    $sucesso = false;
}

$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Animal - Patinhas Felizes</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>🐾 Patinhas Felizes</h1>
        <p>Cadastro de Novo Animal para Adoção</p>
    </header>

    <nav>
        <a href="index.php">Início</a>
        <a href="cadastrar.php">Cadastrar Animal</a>
        <a href="listar.php">Animais para Adoção</a>
    </nav>

    <div class="container">
        <div class="card">
            <h2>Formulário de Cadastro</h2>
            
             <!-- AQUI ESCREVER O CÓDIGO EM PHP QUE CAPTURA OS DADOS DOS ANIMAIS E INSERE NO BANCO DE DADOS -->
           
        </div>
    </div>

    <footer>
        <p>&copy; 2026 Patinhas Felizes - Programação Web 2 | Curso Técnico em Informática | IFBA Campus Ilhéus</p>
    </footer>

</body>
</html>
