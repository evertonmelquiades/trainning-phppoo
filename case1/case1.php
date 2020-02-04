<?php

#cLASSE 
require 'produto.php';

$p1 = new Produto();
$p1->setNome("aaaa");
var_dump($p1->getNome());

$p1 = new Produto();
$p1->setValor(300);
var_dump($p1->getValor());

?>