<?php
require_once 'class/Controller.php';
//echo $_POST['version'];
$id_version = (int) 1;
$description_txt = "                                      ATUALIZAÇÃO {versao} \n\r\n\r";

$controller = new Controller();

$return = (array) $controller->find_all('descriptions', ['id_version', '===', (int) $id_version], ['id_description' => (bool) false]);

if(empty($return) == false){
    foreach($return as $description){
            $description_txt = $description_txt."   -><strong>".$description['archivo']."</strong>\n\r";
            $description_txt = $description_txt."   . ".$description['description']."\n\r\n\r";
    }
}
file_put_contents('notas_atualizacao.txt', $description_txt);

$controller->download('notas_atualizacao.txt');
?>