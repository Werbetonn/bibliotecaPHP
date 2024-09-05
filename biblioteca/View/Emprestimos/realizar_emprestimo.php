<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Empréstimo</title>
    <link rel="stylesheet" href="..\Emprestimos\realizar_emprestimo.css">
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
        <h2>Realizar Empréstimo</h2>
        <form action="processa_emprestimo.php" method="POST">
            <label for="livro">Livro:</label><br>
            <input type="text" id="livro" name="livro" required><br><br>

            <label for="estudante">Estudante:</label><br>
            <input type="text" id="estudante" name="estudante" required><br><br>

            <label for="data_emprestimo">Data do Empréstimo:</label><br>
            <input type="date" id="data_emprestimo" name="data_emprestimo" required><br><br>

            <input type="submit" value="Realizar Empréstimo">
        </form>
    </main>

    <footer>
        <p>&copy; Desenvolvido por Eduarda Batista, Vicencya Nayara e Werbeton da Silva.</p>
    </footer>
</body>
</html>
