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
    <div class="card">
        <h2>Animais Disponíveis para Adoção</h2>

        <!-- Formulário de filtros utilizando o método GET -->
        <form action="listar.php" method="GET" class="filtro-form">
            <div class="form-group">
                <label for="filtro-especie">Espécie:</label>
                <select id="filtro-especie" name="especie">
                    <option value="">Todas</option>
                    <option value="Cachorro" <?php echo $especie === "Cachorro" ? "selected" : ""; ?>>Cachorro</option>
                    <option value="Gato" <?php echo $especie === "Gato" ? "selected" : ""; ?>>Gato</option>
                </select>
            </div>

            <div class="form-group">
                <label for="filtro-porte">Porte:</label>
                <select id="filtro-porte" name="porte">
                    <option value="">Todos</option>
                    <option value="Pequeno" <?php echo $porte === "Pequeno" ? "selected" : ""; ?>>Pequeno</option>
                    <option value="Médio" <?php echo $porte === "Médio" ? "selected" : ""; ?>>Médio</option>
                    <option value="Grande" <?php echo $porte === "Grande" ? "selected" : ""; ?>>Grande</option>
                </select>
            </div>

            <button type="submit">Filtrar animais</button>
        </form>

        <?php if ($quantidade > 0): ?>
            <p><strong><?php echo $quantidade; ?></strong> animal(is) encontrado(s).</p>

            <div class="table-responsive">
                <table>
                    <tr>
                        <th>Nome</th>
                        <th>Espécie</th>
                        <th>Idade</th>
                        <th>Porte</th>
                        <th>Descrição</th>
                    </tr>

                    <?php while ($animal = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($animal["nome"]); ?></td>
                            <td><?php echo htmlspecialchars($animal["especie"]); ?></td>
                            <td><?php echo htmlspecialchars($animal["idade"]); ?> ano(s)</td>
                            <td><?php echo htmlspecialchars($animal["porte"]); ?></td>
                            <td><?php echo nl2br(htmlspecialchars($animal["descricao"])); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        <?php else: ?>
            <div class="alert">
                Nenhum animal foi encontrado com os filtros selecionados.
            </div>
        <?php endif; ?>

        <div class="btn-group">
            <a href="cadastrar.php" class="btn">Cadastrar novo animal</a>
            <a href="listar.php" class="btn">Limpar filtros</a>
        </div>
    </div>
</div>

<footer>
    <p>&copy; 2026 Patinhas Felizes - Programação Web 2 | Curso Técnico em Informática | IFBA Campus Ilhéus</p>
</footer>

<?php
// Fecha o statement quando um filtro foi utilizado
if (isset($stmt)) {
    $stmt->close();
}

$conexao->close();
?>

</body>
</html>
