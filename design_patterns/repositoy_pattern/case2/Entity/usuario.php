<?php

namespace Entity{

require 'baseEntity.php';    

class Usuario extends BaseEntity
    {
        public $id;    
        public $nome;
        public $sobrenome;
        public $email;       

        public function __construct($nome = null, $sobrenome = null, $email = null, $id = 0)
        {            
            $this->id = $id;            
            $this->nome = $nome;
            $this->sobrenome = $sobrenome;
            $this->email = $email;        
        }

        public function getFullname()
        {
            echo $this->nome . ' ' . $this->sobrenome;
        }
    }
}
?>