<?php
namespace Demo\Dao;

use Demo\Entity\User;

class UserDao extends BaseDao {

    private $db = null; 
    public function __construct() {
        $this->db = $this->getDb();
    }

    public function getUserById(int $id): User {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id=?");
        $stmt->execute([$id]); 
        $user = $stmt->fetch();
        return $this->toObject($user['username'], $user['useremail']);   
    }

    public function insert(User $user): int {
        $lastInsertId = 0;
        $values = $this->toArray($user); // array
        $fields = array_keys($values);
        $vals   = array_values($values);

        $arr = array();
        foreach ($fields as $f) {$arr[] = '?';}

        $sql = "INSERT INTO users ";
        $sql .= '('.implode(',', $fields).') ';
        $sql .= 'VALUES ('.implode(',', $arr).') ';
        
        $statement = $this->db->prepare($sql);
        
        foreach ($vals as $i=>$v) {$statement->bindValue($i+1, $v);}
        
        if($statement->execute()){
            $lastInsertId = $this->db->lastInsertId();
        }
        return $lastInsertId;
    }

    public function getUsers() {
        $users = $this->db->query("SELECT id, username, useremail FROM users")->fetchAll();
        $temp = array();
        foreach ($users as $user) {
            // $user['id'];
            $temp[] = $this->toObject($user['username'], $user['useremail']);
        }
        return $temp;
    }

    public function searchByEmail($useremail){
        $statement = $this->db->prepare("SELECT * FROM users WHERE useremail LIKE :useremail");
        $statement->bindValue(':useremail', '%'.$useremail.'%');
        $statement->execute(); 
        $users = $statement->fetchAll();
        $temp = array();
        foreach ($users as $user) {
            $temp[] = $this->toObject($user['username'], $user['useremail']);
        }
        return $temp;
    }

    public function toArray(User $user) {
        $temp = array();
        $temp['username'] = $user->getName();
        $temp['useremail'] = $user->getEmail();
        $temp['password'] = md5($user->getPassword());
        $temp['timestamp'] = time();
        return $temp;
    }

    public function toObject($username, $useremail): User {
        $user = new User($username, $useremail, "");
        return $user;
    }

    public function getPDO(){
        return $this->db;
    }
}