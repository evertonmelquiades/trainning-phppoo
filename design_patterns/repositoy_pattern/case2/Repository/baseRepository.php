<?php 

namespace Repository{

    use \PDO;

    class BaseRepository
    {
        protected $connection;
        
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
        
        public function getConnection(){
            return $this->connection;        
        }

        public function beginTransaction(){
            if($this->connection !== null){
                $this->connection->beginTransaction();
            }
        }

        public function commitChanges(){
            if($this->connection !== null){
                $this->connection->commit();
            }
        }

        public function rollbackChanges(){
            if($this->connection !== null){
                $this->connection->rollBack();
            }
        }
    }
}
?>