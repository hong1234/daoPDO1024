<?php
namespace Demo\Dao;

use Demo\Entity\Product;

class ProductDao extends BaseDao {

    private $db = null; 
    public function __construct() {
        $this->db = $this->getDb();
    }

    public function getProductByID($productid): Product|null {
        $stm = $this->db->prepare("SELECT * FROM products WHERE id = :proId LIMIT 1"); 
        $stm->bindParam(':proId', $productid);
        $stm->execute();
        if ($stm->rowCount() > 0) {
            $rs = $stm->fetch();
            return $this->toObject($rs['name'], $rs['id']);
        }
        return null;
    }

    public function insert(Product $product): int {

        $lastInsertId = 0;

        $values = $this->toArray($product); // array
        $fields = array_keys($values);
        $vals   = array_values($values);

        $arr = array();
        foreach ($fields as $f) {$arr[] = '?';}

        $sql = "INSERT INTO products ";
        $sql .= '('.implode(',', $fields).') ';
        $sql .= 'VALUES ('.implode(',', $arr).') ';
        
        $statement = $this->db->prepare($sql);
        
        foreach ($vals as $i=>$v) {$statement->bindValue($i+1, $v);}
        
        if($statement->execute()){
            $lastInsertId = $this->db->lastInsertId();
        }
        return $lastInsertId;
    }

    public function toArray(Product $product): array {
        $temp = array();
        $temp['name'] = $product->getName();
        // $temp['features'] = $product->getFeatures();
        return $temp;
    }

    public function toObject(string $name, int $id = 0, array $features = []): Product {
        $product = new Product($name, $id);
        return $product;
    }
}
