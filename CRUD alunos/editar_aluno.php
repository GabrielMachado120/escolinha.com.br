<?php
require_once __DIR__ . "/../log/conexao.php";
require_once __DIR__ . "/../log/functions.php";
// Recebe o ID pela URL e converte para inteiro.
$id_aluno = (int)($_GET["id"] ?? 0);
// Se o formulário foi enviado, atualiza os dados.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"]);
$cpf = trim($_POST["cpf"]);
$curso = trim($_POST["curso"]);
$login = trim($_POST["login"]);
$senha = $_POST["senha"]; // Vazio = mantém a senha atual.
if (atualizar_aluno($conexao, $id_aluno, $nome, $cpf, $curso, $login, $senha)) {
header("Location: listar_alunos.php");
exit;
}
echo "Não foi possível atualizar.";
}
// Busca os dados atuais para preencher o formulário.
$resultado = buscar_aluno($conexao, $id_aluno);
$aluno = mysqli_fetch_assoc($resultado);
if (!$aluno) {
die("Aluno não encontrado.");
}
?>
<!DOCTYPE html>
<html lang="en">
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
        small {
            display: flex;
            margin-top: 70px;
            margin-left: 900px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Editar aluno</h1>
    </header>
    <form method="POST">
        <p>Nome:</p> <input name="nome" value="<?= htmlspecialchars($aluno["nome"]) ?>" required><br>
        <p>CPF:</p> <input name="cpf" value="" placeholder="Digite novamente o CPF" required><br>
        <p>Curso:</p> <input name="curso" value="<?= htmlspecialchars($aluno["curso"]) ?>" required><br>
        <p>Login:</p> <input name="login" value="<?= htmlspecialchars($aluno["login"]) ?>" required><br>
        <p>Nova senha:</p> <input type="password" name="senha"><br>
    <button type="submit">Salvar alterações</button><br>
</form> 
    <small>Deixe a senha vazia para manter a atual.</small>
</body>
</html>
