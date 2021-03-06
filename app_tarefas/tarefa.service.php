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
    public function recuperar(){
        //$query = 'SELECT * FROM tb_tarefas';
        $query = ' 
            SELECT
                t.id, s.status, tarefa 
            FROM
                tb_tarefas  as t
                left join tb_status as s on (t.id_status = s.id)
            ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ); //FETCH_ASSOC
    }
    public function atualizar(){
        //print_r($this->tarefa);
        //$query = "UPDATE tb_tarefas SET tarefa, descricao, valor = :tarefa, :descricao, :valor WHERE id = :id";
        $query = "UPDATE tb_tarefas SET tarefa = :tarefa WHERE id = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $stmt->bindValue(':id', $this->tarefa->__get('id'));
        return $stmt->execute();
    }
    public function remover(){
        $query = ' DELETE FROM tb_tarefas WHERE id = :id ';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->tarefa->__get('id'));
        $stmt->execute();
    }
    public function marcarRealizada(){
        $query = "UPDATE tb_tarefas SET id_status = :id_status where id = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
        $stmt->bindValue(':id', $this->tarefa->__get('id'));
        return $stmt->execute();
    }
    public function recuperarTarefasPendentes(){
          $query = ' 
            SELECT
              t.id, s.status, t.tarefa, t.descricao, t.valor
            FROM
              tb_tarefas  as t
              left join tb_status as s on (t.id_status = s.id)
            WHERE
                t.id_status = :id_status
          
          ';
      $stmt = $this->conexao->prepare($query);
      $stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_OBJ); //FETCH_ASSOC
    }
}