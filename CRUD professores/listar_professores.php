<?php
require_once __DIR__ . "/../log/conexao.php";
require_once __DIR__ . "/../log/functions.php";
// Solicita a lista de professores ao arquivo de funções.
$resultado = listar_professores($conexao);
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
        margin-top: -380px;
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
<h1>Professores cadastrados</h1>
</header>
<a class="cadastrar" href="gravar_professor.php">Cadastrar novo professor</a>
<table border="1" cellpadding="8">
<tr>
<th>ID</th>
<th>Nome</th>
<th>CPF (MD5)</th>
<th>Curso</th>
<th>Login</th>
<th>Ações</th>
</tr>

<?php while ($professor = mysqli_fetch_assoc($resultado)) { ?>
<tr>
<td><?= $professor["id_professor"] ?></td>
<td><?= htmlspecialchars($professor["nome"]) ?></td>
<td><?= htmlspecialchars($professor["cpf"]) ?></td>
<td><?= htmlspecialchars($professor["curso"]) ?></td>
<td><?= htmlspecialchars($professor["login"]) ?></td>
<td>
<a href="editar_professor.php?id=<?= $professor["id_professor"] ?>">Editar</a>
|
<a href="excluir_professor.php?id=<?= $professor["id_professor"] ?>"
onclick="return confirm('Deseja excluir este professor?')">
Excluir
</a>
</td>
</tr>
<?php } ?>
</table>
<a class="voltar" href="../log/index.php">Voltar ao início</a>