<?php
require_once __DIR__ . "/../log/conexao.php";
require_once __DIR__ . "/../log/functions.php";
// Chama a função que consulta os alunos.
$resultado = listar_alunos($conexao);
?>
<style>
    * {
        padding: 0;
        margin: 0;
    }
    header {
        background-color: black;
        color: white;
        padding: 30px;
        text-align: center;
    }
    .cadastrar {
        display: flex;
        margin-top: -30px;
        color: white;
        text-decoration: none;
    }
    table {
        display: flex;
        margin-top: 300px;
        margin-left: 650px;
        border-collapse: collapse;
        width: 50%;
    }
    .voltar {
        display: flex;
        text-decoration: none;
        color: white;
        margin-top: -420px;
        margin-left: 1800px;
    }
    td,th {
        border: 1px solid #333;
        padding: 8px;
        text-align: center;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:nth-child(odd){
        background-color: #ddd;
    }
</style>
<header>
<h1>Alunos cadastrados</h1>
</header>
<a href="../CRUD alunos/gravar_aluno.php" class="cadastrar">Cadastrar novo aluno</a>
<table border="1" cellpadding="8">
<tr>
<th>ID</th>
<th>Nome</th>
<th>CPF (MD5)</th>
<th>Curso</th>
<th>Login</th>
<th>Ações</th>
</tr>

<?php while ($aluno = mysqli_fetch_assoc($resultado)) { ?>
<tr>
<td><?= $aluno["id_aluno"] ?></td>
<td><?= htmlspecialchars($aluno["nome"]) ?></td>
<td><?= htmlspecialchars($aluno["cpf"]) ?></td>
<td><?= htmlspecialchars($aluno["curso"]) ?></td>
<td><?= htmlspecialchars($aluno["login"]) ?></td>
<td>
<a href="editar_aluno.php?id=<?= $aluno["id_aluno"] ?>">Editar</a>
|
<a href="excluir_aluno.php?id=<?= $aluno["id_aluno"] ?>"
onclick="return confirm('Deseja excluir este aluno?')">
Excluir
</a>
</td>
</tr>
<?php } ?>
</table>
<a class="voltar"  href="../log/index.php">Voltar ao início</a>