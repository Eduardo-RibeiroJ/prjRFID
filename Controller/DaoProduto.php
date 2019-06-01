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

        $mysqli = new mysqli("localhost", "root", "", "bd_rfid");

        if ($produto->getIdProduto() == NULL) {

           $SQL = $mysqli->query("SELECT * FROM tbProduto");
           return $SQL;

        } else {

           $SQL = $this->db->query("SELECT * FROM tbProduto WHERE idProduto ='".$produto->getIdProduto()."'");
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
}

?>