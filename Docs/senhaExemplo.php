<?php 
include "Model/Bcrypt.php";

$senha_login = "1234";
$senha       = "1234";

echo $senha;

echo '<hr>';

echo md5($senha);

echo '<hr>';

$senha_banco =  Bcrypt::hash($senha); 

echo '<hr>';

if(Bcrypt::check($senha_login, $senha_banco)){

	echo  'correta';

}else{

	echo  'errada';
}
 
