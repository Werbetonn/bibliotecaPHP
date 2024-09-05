<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Livro</title>
    <link rel="stylesheet" href="..\Livros\cadastrar_livro.css">
</head>
<body>
    <header>
        <h3>Gerenciamento de Biblioteca</h3>
        <nav>
            <a href="../index.php">Início</a>
            <a href="../Livros/livros.php">Livros</a>
            <a href="../Estudantes/estudantes.php">Estudantes</a>
            <a href="../Emprestimos/emprestimos.php">Empréstimos</a>
        </nav>
    </header>

    <main>
        <h2>Cadastrar Novo Livro</h2>
        <form action="processa_livro.php" method="POST">
            <label for="titulo">Título do Livro:</label><br>
            <input type="text" id="titulo" name="titulo" required><br><br>

            <label for="autor">Autor do Livro:</label><br>
            <input type="text" id="autor" name="autor" required><br><br>

            <label for="editora">Editora:</label><br>
            <input type="text" id="editora" name="editora" required><br><br>

            <input type="submit" value="Cadastrar Livro">
        </form>
    </main>

    <footer>
        <p>&copy; Desenvolvido por Eduarda Batista, Vicencya Nayara e Werbeton da Silva.</p>
    </footer>
</body>
</html>
