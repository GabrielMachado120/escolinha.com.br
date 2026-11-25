<?php
require_once __DIR__ . "/../log/conexao.php";
require_once __DIR__ . "/../log/functions.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Captura os dados enviados pelo formulário.
$nome = trim($_POST["nome"]);
$cpf = trim($_POST["cpf"]);
$curso = trim($_POST["curso"]);
$login = trim($_POST["login"]);
$senha = $_POST["senha"];
// Executa a função de cadastro do professor.
if (gravar_professor($conexao, $nome, $cpf, $curso, $login, $senha)) {
echo "Professor cadastrado com sucesso!";
} else {
echo "Erro ao cadastrar professor.";
}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        header {
            background-color: black;
            color: white;
            padding: 30px;
            text-align: center;
        }
        form {
            display: flex;
            justify-content: space-evenly;
            margin-top: 300px;         
        }
        a {
            display: flex;
            margin-left: 1750px;
            margin-top: -400px;
            color: white;
            text-decoration: none;
            font-size: 20px;
        }
        p {
            font-size: 30px;
        }
        button {
            background-color: black;
            color: white;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<header>
    <h1>Cadastro Professor</h1>
</header>
<form method="POST">
    <p>Nome:</p> <input type="text" name="nome" required><br><br>
    <p>CPF:</p> <input type="text" name="cpf" required><br><br>
    <p>Curso:</p> <input type="text" name="curso" required><br><br>
    <p>Login:</p> <input type="text" name="login" required><br><br>
    <p>Senha:</p> <input type="password" name="senha" required><br><br>
<button type="submit">Gravar professor</button>
</form>
    <a href="../log/index.php">Voltar ao início</a>
</body>
</html>
