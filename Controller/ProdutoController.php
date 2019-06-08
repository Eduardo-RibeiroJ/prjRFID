<?php

include_once "Model/Conexao.php";

class ProdutoController
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

        $query = "INSERT INTO tbProduto (nomeProd, personalizado, cor, obs, quantTotal, quantDisponivel) VALUES (?,?,?,?,?,?);"; 
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'sissii', $nomeProduto, $personalizado, $cor, $obs, $quantTotal, $quantTotal);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Atualizar(Produto $produto) 
    { 
        $idProduto = $produto->getIdProduto();
        $nomeProd = $produto->getNomeProduto();
        $personalizado = $produto->isPersonalizado();
        $cor = $produto->getCor();
        $obs = $produto->getObs();
        $quantTotal = $produto->getQuantTotal();

        $query = "UPDATE tbProduto SET nomeProd=?, personalizado=?, cor=?, obs=?, quantTotal=? , quantDisponivel=?  WHERE idProduto = ?";
 
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        } 
        
        mysqli_stmt_bind_param($stmt, 'sissiii', $nomeProd, $personalizado, $cor, $obs, $quantTotal, $quantTotal, $idProduto);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Apagar(Produto $produto) {

        $SQL = $this->db->getConection()->prepare("DELETE FROM tbProduto WHERE idProduto = ?");
        $SQL->bind_param("i", $P1);
        $P1 = $produto->getIdProduto();
        $SQL->execute();
        
        return true;

     }

    public function Listar(Produto $produto) {

        if ($produto->getIdProduto() == NULL) {

           $SQL = $this->db->getConection()->query("SELECT * FROM tbProduto");
           return $SQL;

        } else {

           $SQL = $this->db->getConection()->query("SELECT * FROM tbProduto WHERE idProduto ='".$produto->getIdProduto()."'");
           return $SQL;

        }
     }     
}

?>
