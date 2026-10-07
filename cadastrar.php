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
            

            <form action="cadastrar_confirmar.php" method="POST">
                <div class="form-group">
                    <label for="nome">Nome do Animal:</label>
                    <input type="text" id="nome" name="nome" required placeholder="Ex: Bob, Mel...">
                </div>

                <div class="form-group">
                    <label for="especie">Espécie:</label>
                    <select id="especie" name="especie" required>
                        <option value="">Selecione...</option>
                        <option value="Cachorro">Cachorro</option>
                        <option value="Gato">Gato</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="idade">Idade Aproximada (anos):</label>
                    <input type="number" id="idade" name="idade" min="0" max="30" required placeholder="Ex: 2">
                </div>

                <div class="form-group">
                    <label for="porte">Porte:</label>
                    <select id="porte" name="porte" required>
                        <option value="">Selecione...</option>
                        <option value="Pequeno">Pequeno</option>
                        <option value="Médio">Médio</option>
                        <option value="Grande">Grande</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="descricao">Histórico / Descrição:</label>
                    <textarea id="descricao" name="descricao" required placeholder="Conte um pouco sobre o temperamento e a história do animal..."></textarea>
                </div>

                <button type="submit">Cadastrar Animal</button>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 Patinhas Felizes - Programação Web 2 | Curso Técnico em Informática | IFBA Campus Ilhéus</p>
    </footer>

</body>
</html>