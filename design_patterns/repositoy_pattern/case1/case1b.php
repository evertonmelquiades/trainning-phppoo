<?php

require 'usuario.php';
require 'usuarioRepository.php';

use Entity\Usuario;
use Repository\UsuarioRepository;

$usuarioRepository = new UsuarioRepository();

try {
    $usuario = $usuarioRepository->find(1);    

    if(isset($usuario)){
        echo "Usuário $usuario->nome encontrado.";
    }

} catch (Exception $exception) {
    echo $exception->getMessage();
}


?>