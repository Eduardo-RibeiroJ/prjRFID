<?php

include_once "Model\Conexao.php";
  
class DaoProduto
{
    private $db;
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(Produto $produto) 
    {
        $nomeProduto = $produto->getNomeProduto();
        $personalizado = $produto->isPersonalizado();
        $cor = $produto->getCor();
        $obs = $produto->getObs();
        $quantTotal = $produto->getQuantTotal();

        $query = "INSERT INTO `tbproduto`(`nomeProd`, `personalizado`, `cor`, `obs`, `quantTotal`, `quantDisponivel`) VALUES (?,?,?,?,?,?);"; 
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'sissii', $nomeProduto, $personalizado, $cor, $obs, $quantTotal, $quantTotal);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }
}

?>