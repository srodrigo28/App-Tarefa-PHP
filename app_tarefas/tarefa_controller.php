<?php
    require "../app_tarefas/tarefa.model.php";
    require "../app_tarefas/tarefa.service.php";
    require "../app_tarefas/conexao.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
    
if( $acao == 'inserir' ){
    //echo '<pre>';   print_r($_POST); echo '</pre>';
    $tarefa = new Tarefa();
    $tarefa-> __set('tarefa', $_POST['tarefa']);
    $tarefa-> __set('descricao', $_POST['descricao']);
    $tarefa-> __set('valor', $_POST['valor']);

    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->inserir();
    //print_r($tarefaService);
    header('Location: nova_tarefa.php?inclusao=1');
} else if( $acao == 'recuperar' ){
    //echo '<h1 class="text-center"> Chegamos até aqui! </h1>';
    $tarefa = new Tarefa();
    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefas = $tarefaService->recuperar();
} else if( $acao == 'atualizar' ){
    // echo '<h1 class="text-center"> Atualizando via controller! </h1>';
    // echo '<pre>';   print_r($_POST); echo '</pre>';
    $tarefa = new Tarefa();
    $tarefa->__set('id',$_POST['id']);
    $tarefa->__set('tarefa',$_POST['tarefa']);

    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
    if( $tarefaService->atualizar()){
        header('location: todas_tarefas.php');
    }
}else if($acao == 'remover'){
    //echo '<h1 class="text-center"> removendo via controller! </h1>';
    $tarefa = new Tarefa();
    $tarefa->__set('id', $_GET['id']);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->remover();
    header('location: todas_tarefas.php');
} else if($acao == 'marcarRealizada'){

    $tarefa = new Tarefa();
    $tarefa->__set('id', $_GET['id']) -> __set('id_status', 2);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);

    $tarefaService->marcarRealizada();
    header('location: todas_tarefas.php');
    
} else if($acao == 'recuperarTarefasPendentes'){
      //echo '<h1 class="text-center"> Chegamos até aqui! </h1>';
      $tarefa = new Tarefa();
      $tarefa-> __set('id_status', 1);
      $conexao = new Conexao();
  
      $tarefaService = new TarefaService($conexao, $tarefa);
      $tarefas = $tarefaService->recuperarTarefasPendentes();
}