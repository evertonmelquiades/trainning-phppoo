<?php 

    class Produto{

        private $nome;
        private $valor;
        private $desconto;

        public function __construct($desconto)
        {
            $this->desconto = $desconto;
        }
        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
        public function getValor(){
            return $this->valor;
        }
        
        public function setValor(int $valor){
            $this->valor = $valor;
        }    
        public function getDesconto(){
            $desconto =  $this->valor - 10;
            
                return "O desconto foi de R$" . $desconto;
            
        }

