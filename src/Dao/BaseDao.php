<?php
namespace Demo\Dao;

abstract class BaseDao {
    protected final function getDb(){
        $instance = DbConnect::getInstance();
        $conn = $instance->getConnection();
        return $conn;
    }

    // abstract protected function get($uniqueKey);
    // abstract protected function insert(array $values);
    // abstract protected function update($id, array $values);
    // abstract protected function delete($uniqueKey);
}