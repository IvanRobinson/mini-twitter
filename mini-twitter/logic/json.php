<?php
   $array = array('nome'=>'Jose da Silva',
                  'cidade'=>'Bandeirantes',
                  'estado'=>'Paraná');
   header('Content-Type: application/json');
   echo json_encode($array);
   //sleep(3);
?>