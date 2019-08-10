<?php

include_once "Model/Conexao.php";

class UsuarioController
{

    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(Usuario $usuario) 
    {
        $nomeUsuario = $usuario->getNomeUsuario();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();
        $nivel = $usuario->getNivel();

        $query = "INSERT INTO tbUsuario (nomeUsuario, email, senha, nivel) VALUES (?,?,?,?);"; 
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'sssi', $nomeUsuario, $email, $senha, $nivel);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Atualizar(Usuario $usuario) 
    { 
        $idUsuario = $usuario->getIdUsuario();
        $nomeUsuario = $usuario->getNomeUsuario();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();
        $nivel = $usuario->getNivel();

        $query = "UPDATE tbUsuario SET nomeUsuario=?, email=?, senha=?, nivel=? WHERE idUsuario = ?";
 
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        } 
        
        mysqli_stmt_bind_param($stmt, 'sssii', $nomeUsuario, $email, $senha, $nivel, $idUsuario);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Apagar(Usuario $usuario) {

        $SQL = $this->db->getConection()->prepare("DELETE FROM tbUsuario WHERE idUsuario = ?");
        $SQL->bind_param("i", $U1);
        $U1 = $produto->getIdUsuario();
        $SQL->execute();
        
        return true;

     }

    public function Listar(Usuario $usuario) {

        if ($produto->getIdUsuario() == NULL) {

           $SQL = $this->db->getConection()->query("SELECT * FROM tbUsuario");
           return $SQL;

        } else {

           $SQL = $this->db->getConection()->query("SELECT * FROM tbUsuario WHERE idUsuario ='".$usuario->getIdUsuario()."'");
           return $SQL;

        }
     }     
}

?>
