<?php 

namespace Repository{

use Entity\Usuario;
use \PDO;
use stdClass;

class UsuarioRepository
{
    private $connection;
    
    public function __construct(PDO $connection = null)
    {
        $this->connection = $connection;
        if ($this->connection === null) {
            $this->connection = new PDO(
                    'mysql:host=localhost:3308;dbname=db_poo_rp', 
                    'root', 
                    ''
                );
            $this->connection->setAttribute(
                PDO::ATTR_ERRMODE, 
                PDO::ERRMODE_EXCEPTION
            );
        }
    }

    public function find($id)
    {
        $stmt = $this->connection->prepare('
            SELECT 
                id_usuario as id, 
                nome, 
                sobrenome, 
                email 
             FROM usuario 
             WHERE id_usuario = :id_usuario
        ');
        $stmt->bindParam(':id_usuario', $id);
        $stmt->execute();
                
        $stmt->setFetchMode(PDO::FETCH_INTO, new Usuario());
        return $stmt->fetch();
    }

    public function findAll()
    {
        $stmt = $this->connection->prepare('
            SELECT id_usuario as id, nome, sobrenome, email FROM usuario
        ');
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_INTO, new stdClass());
        
        return $stmt->fetchAll();
    }

    public function save(Usuario $usuario)
    {
        // Se existir Id, é uma alteração
        if (!empty($usuario->id)) {
            return $this->update($usuario);
        }

        $stmt = $this->connection->prepare('
            INSERT INTO usuario 
                (nome, sobrenome, email) 
            VALUES 
                (:nome , :sobrenome, :email)
        ');        
        $stmt->bindParam(':nome', $usuario->nome);
        $stmt->bindParam(':sobrenome', $usuario->sobrenome);
        $stmt->bindParam(':email', $usuario->email);
        $stmt->execute();
        $id = $this->connection->lastInsertId();
        return $id;

    }

    public function update(Usuario $usuario)
    {
        if (!isset($usuario->id)) {
            // We can't update a record unless it exists...
            throw new \LogicException(
                'Usuário não existe.'
            );
        }
        $stmt = $this->connection->prepare('
            UPDATE usuario
            SET nome = :nome,
                sobrenome = :sobrenome,
                email = :email
            WHERE id_usuario = :id_usuario
        ');
        
        $stmt->bindParam(':nome', $usuario->nome);
        $stmt->bindParam(':sobrenome', $usuario->sobrenome);
        $stmt->bindParam(':email', $usuario->email);
        $stmt->bindParam(':id_usuario', $usuario->id);

        $stmt->execute();
        return $usuario->id;
    }
}
}
?>