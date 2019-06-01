<?php

include_once "Model\Conexao.php";

class DaoProduto
{

    
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

    public function listarProdutos(Produto $produto) {

        if ($produto->getIdProduto() == NULL) {

           $SQL = $this->db->getConection()->query("SELECT * FROM tbProduto");
           return $SQL;

        } else {

           $SQL = $this->db->getConection()->query("SELECT * FROM tbProduto WHERE idProduto ='".$produto->getIdProduto()."'");
           $rs = $SQL->fetch_array();
           $produto->setIdProduto($rs["idProduto"]);
           $produto->setNomeProduto($rs["nomeProd"]);
           $produto->setPersonalizado($rs["personalizado"]);
           $produto->setCor($rs["cor"]);
           $produto->setObs($rs["obs"]);
           $produto->setQuantTotal($rs["quantTotal"]);
           $produto->setQuantDisponivel($rs["quantDisponivel"]);

        }
     }

     public function apagarProduto(Produto $produto) {

        $SQL = $this->db->getConection()->prepare("DELETE FROM tbProduto WHERE idProduto = ?");
        $SQL->bind_param("i", $P1);
        $P1 = $produto->getIdProduto();
        $SQL->execute();
        
        return true;

     }
}

?>