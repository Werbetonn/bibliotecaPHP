<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Estudante</title>
    <link rel="stylesheet" href="..\Estudantes\cadastrar_estudante.css">
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
        <h2>Cadastrar Novo Estudante</h2>
        <form action="processa_estudante.php" method="POST">
            <label for="nome">Nome do Estudante:</label><br>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="matricula">Matrícula:</label><br>
            <input type="text" id="matricula" name="matricula" required><br><br>

            <label for="curso">Curso:</label><br>
            <input type="text" id="curso" name="curso" required><br><br>

            <input type="submit" value="Cadastrar Estudante">
        </form>
    </main>

    <footer>
        <p>&copy; Desenvolvido por Eduarda Batista, Vicencya Nayara e Werbeton da Silva.</p>
    </footer>
</body>
</html>
