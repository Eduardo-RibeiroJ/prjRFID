<?php

include_once "Model/Conexao.php";

$data = $_POST;
//$data = (array) json_decode( file_get_contents('1578749502.json') );

$field_values = $data['field_values'];

$list_fields = preg_split( '/\r\n|\r|\n/', $field_values );
array_pop($list_fields);

$epcs = [];

foreach($list_fields as $field){
   $field_values = explode(',', $field);

   $epcs[] = [
      'EPC' => $field_values[0],
      'Time' => $field_values[1]
   ];

   $time = date('Y-m-d H:m:s', strtotime($field_values[1]));

   $sql_command = "INSERT INTO `tbtemp` (`etiqueta`, `data_criacao`) VALUES ('{$field_values[0]}', '{$time}');";

   ECHO $sql_command . '<br>';

   $db = new Conexao();
   $dados = mysqli_query($db->getConection(), $sql_command); 
}
