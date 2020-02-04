<?php
require 'pessoa.php';

class PessoaJuridica extends Pessoa{
    public function __construct($documento)
    {
        // propriedade protected
        $this->documento = $documento;
    }
}
?>