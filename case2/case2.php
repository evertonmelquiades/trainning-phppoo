<?php
#Propriedade: privada, protected e public
 
require 'pessoaJuridica.php';

$pj1 = new PessoaJuridica("123456");
$pj1->nome = "Trainning".PHP_EOL;
//$pj1->documento = "123456"; //não consigo
echo $pj1->nome; //propriedade publica
echo $pj1->getDocumento();

?>