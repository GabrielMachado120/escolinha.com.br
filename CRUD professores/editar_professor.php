<?php
require_once __DIR__ . "/../log/conexao.php";
require_once __DIR__ . "/../log/functions.php";
// Recebe o ID pela URL e converte para inteiro.
$id_professor = (int)($_GET["id"] ?? 0);
// Se o formulário foi enviado, atualiza os dados.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"]);
    $cpf = trim($_POST["cpf"]);
    $curso = trim($_POST["curso"]);
    $login = trim($_POST["login"]);
    $senha = $_POST["senha"]; // Vazio = mantém a senha atual.
    if (atualizar_aluno($conexao, $id_professor, $nome, $cpf, $curso, $login, $senha)) {
        header("Location: listar_alunos.php");
        exit;
    }
        echo "Não foi possível atualizar.";
    }
    // Busca os dados atuais para preencher o formulário.
    $resultado = buscar_aluno($conexao, $id_professor);
    $professor = mysqli_fetch_assoc($resultado);
    if (!$professor) {
        die("Aluno não encontrado.");
    }
    ?>
    <h1>Editar Professor</h1>
    <form method="POST">
    Nome: <input name="nome" value="<?= htmlspecialchars($professor["nome"]) ?>" required><br>
    CPF: <input name="cpf" value="" placeholder="Digite novamente o CPF" required><br>
    Curso: <input name="curso" value="<?= htmlspecialchars($professor["curso"]) ?>" required><br>
    Login: <input name="login" value="<?= htmlspecialchars($professor["login"]) ?>" required><br>
    Nova senha: <input type="password" name="senha"><br>
    <small>Deixe a senha vazia para manter a atual.</small><br>
    <button type="submit">Salvar alterações</button>