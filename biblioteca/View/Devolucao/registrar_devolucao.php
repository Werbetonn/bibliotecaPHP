<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Devolução</title>
    <link rel="stylesheet" href="..\Devolucao\registrar_devolucao.css">
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
        <h2>Registrar Devolução</h2>
        <form action="processa_devolucao.php" method="POST">
            <label for="emprestimo">Empréstimo:</label><br>

            
            <select id="emprestimo" name="emprestimo" required>
                <option value="">Selecione um empréstimo</option>
                <!-- As opções de empréstimos serão carregadas aqui quando o banco de dados estiver conectado -->
                <option value="1">Exemplo Livro 1 - Nome Estudante 1 (Emprestado em: 2024-09-01)</option>
                <option value="2">Exemplo Livro 2 - Nome Estudante 2 (Emprestado em: 2024-09-02)</option>
            </select><br><br>

            <label for="data_devolucao">Data da Devolução:</label><br>
            <input type="date" id="data_devolucao" name="data_devolucao" required><br><br>

            <!-- Botão para registrar a devolução -->
            <input type="submit" value="Registrar Devolução">
        </form>
    </main>

    <footer>
        <p>&copy; Desenvolvido por Eduarda Batista, Vicencya Nayara e Werbeton da Silva.</p>
    </footer>
</body>
</html>
