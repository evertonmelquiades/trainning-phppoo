<?php

namespace Repository\Contracts{

    use Entity\BaseEntity;    

Interface BaseRepositoryInterface{

        public function find($id);

        public function findAll();
        
        public function save(BaseEntity $entity);

        public function update(BaseEntity $entity);
    }
}
?>