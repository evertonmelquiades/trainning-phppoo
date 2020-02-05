<?php
require 'pessoa.php';

class PessoaJuridica extends Pessoa{ //Pessoa juridica herda tudo de Pessoa//
    public function __construct($id, $documento)
    {
        // propriedade protected
        $this->id = $id;
        $this->documento = $documento;
    }
   
}
?>