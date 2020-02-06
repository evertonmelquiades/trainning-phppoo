<?php

require 'usuario.php';
require 'usuarioRepository.php';

use Entity\Usuario;
use Repository\UsuarioRepository;

$usuario = new Usuario("Diego", "Santos", "diegosr.trainning@gmail.com");
$usuarioRepository = new UsuarioRepository();

try {
    $sucesso = $usuarioRepository->save($usuario);    

    if($sucesso){
        echo "Usuário salvo com sucesso";
    }

} catch (Exception $exception) {
    echo $exception->getMessage();
}


?>