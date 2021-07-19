<?php

class TarefaService{
    
    private $conexao;
    private $tarefa;

    public function __construct(Conexao $conexao, Tarefa $tarefa){
        $this->conexao = $conexao->conectar();
        $this->tarefa = $tarefa;
    }

    public function inserir(){
        $query = 'INSERT INTO tb_tarefas(tarefa, descricao, valor) VALUES(:tarefa, :descricao, :valor)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $stmt->bindValue(':descricao', $this->tarefa->__get('descricao'));
        $stmt->bindValue(':valor', $this->tarefa->__get('valor'));
        $stmt->execute();
    }
    public function recuperar(){}
    public function atualizar(){}
    public function remover(){}
}