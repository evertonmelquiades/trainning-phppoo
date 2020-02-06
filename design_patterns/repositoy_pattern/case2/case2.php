<?php
require 'Repository\usuarioRepository.php';
require 'Entity\usuario.php';

use Entity\Usuario;
use Repository\UsuarioRepository;

$usuarioRepo = new UsuarioRepository();
$usuario = new Usuario("Zé", "Trovão", "ze@gmail.com");

$usuarioRepo->getConnection()->beginTransaction();
$id = $usuarioRepo->save($usuario);
$usuarioRepo->getConnection()->commit();

echo $id;

?>