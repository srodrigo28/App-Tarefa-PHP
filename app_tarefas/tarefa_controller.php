<?php
    require "../app_tarefas/tarefa.model.php";
    require "../app_tarefas/tarefa.service.php";
    require "../app_tarefas/conexao.php";

echo '<pre>';   print_r($_POST); echo '</pre>';

$tarefa = new Tarefa();
$tarefa-> __set('tarefa', $_POST['tarefa']);

$conexao = new Conexao();
$tarefaService = new TarefaService($conexao, $tarefa);
$tarefaService->inserir();

print_r($tarefaService);