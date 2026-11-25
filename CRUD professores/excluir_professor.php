<?php
require_once __DIR__ . "/../log/conexao.php";
require_once __DIR__ . "/../log/functions.php";
// Recebe e valida o identificador.
$id_professor = (int)($_GET["id"] ?? 0);
// Chama a função que executa o DELETE.
if ($id_professor > 0 && excluir_aluno($conexao, $id_professor)) {
header("Location: listar_alunos.php");
exit;
}
echo "Não foi possível excluir o aluno.";
?>