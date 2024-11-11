<?php
namespace Demo\Dao;

use Demo\Entity\Feature;

class FeatureDao extends BaseDao {

    private $db = null; 
    public function __construct() {
        $this->db = $this->getDb();
    }

    public function getFeaturesByProductId(int $productid): array {
        $tem = array();
        $stm = $this->db->prepare("SELECT * FROM features WHERE product_id = :proId"); 
        $stm->bindParam(':proId', $productid);
        $stm->execute();
        while($row = $stm->fetch()) {
            $tem[] = $this->toObject($row['name'], $row['product_id']);
        }
        return $tem;
    }

    public function insert(Feature $feature): int {
        
        $lastInsertId = 0;

        $values = $this->toArray($feature); // array

        $fields = array_keys($values);
        $vals   = array_values($values);

        $arr = array();
        foreach ($fields as $f) {$arr[] = '?';}

        $sql = "INSERT INTO features ";
        $sql .= '('.implode(',', $fields).') ';
        $sql .= 'VALUES ('.implode(',', $arr).') ';
        
        $statement = $this->db->prepare($sql);
        
        foreach ($vals as $i=>$v) {$statement->bindValue($i+1, $v);}
        
        if($statement->execute()){
            $lastInsertId = $this->db->lastInsertId();
        }
        return $lastInsertId;
    }

    public function toArray(Feature $feature): array {
        $temp = array();
        $temp['name']       = $feature->getName();
        $temp['product_id'] = $feature->getProductId();
        return $temp;
    }

    public function toObject(string $name, int $productId = 0): Feature {
        $feature = new Feature($name, $productId);
        return $feature;
    }
}
