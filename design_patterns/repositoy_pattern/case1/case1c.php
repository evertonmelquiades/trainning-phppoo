<?php

require 'usuario.php';
require 'usuarioRepository.php';

use Entity\Usuario;
use Repository\UsuarioRepository;

$usuarioRepository = new UsuarioRepository();

try {
    $usuarios = $usuarioRepository->findAll();    
    
    foreach ($usuarios as $key => $usuario) {
        echo "Usuário $usuario->nome encontrado." .PHP_EOL;
    }        
} catch (Exception $exception) {
    echo $exception->getMessage();
}


?>