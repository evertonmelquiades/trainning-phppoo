<?php 

namespace Repository{

    require 'baseRepository.php';
    require 'Contracts\baseRepositoryInterface.php';

    use Entity\BaseEntity;
    use \PDO;
    use Repository\BaseRepository;
    use Repository\Contracts\BaseRepositoryInterface;
    use stdClass;

    class UsuarioRepository extends BaseRepository implements BaseRepositoryInterface
    {    
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
                    
            $stmt->setFetchMode(PDO::FETCH_INTO, new stdClass());
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

        public function save(BaseEntity $usuario)
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

        public function update(BaseEntity $usuario)
        {
            if (!isset($usuario->id)) {
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
            return $stmt->execute();
        }    
    }
}
?>