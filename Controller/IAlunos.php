<?php
//interface criada para padronizar os métodos da classe AlunosSession
interface IAlunos{
    public function adicionar($item);
    public function atualizar($item);
    public function apagar($id);
    public function getTotal();
    public function getItensCarrinho();
    public function estaNoCarrinho($id);
}
?>