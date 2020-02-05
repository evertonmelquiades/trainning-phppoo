<?php
require 'pessoa.php';

<<<<<<< HEAD
class PessoaJuridica extends Pessoa{ //Pessoa juridica herda tudo de Pessoa//
=======
class PessoaJuridica extends Pessoa{
>>>>>>> Organizando
    public function __construct($id, $documento)
    {
        // propriedade protected
        $this->id = $id;
        $this->documento = $documento;
    }
<<<<<<< HEAD
   
=======

    public function obterId(){
        $this->id = 10;
        return $this->id; 
    }
>>>>>>> Organizando
}
?>