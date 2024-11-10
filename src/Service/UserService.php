<?php
namespace Demo\Service;

use Demo\Entity\User;
// use Demo\Dao\UserDao;
use Demo\Dao\BaseDao;

class UserService {
    
    public $userDao;

    public function __construct(BaseDao $userDao) {     
        $this->userDao = $userDao;
    }

    public function addUser(User $user) {
        $userArr = $this->userDao->toArray($user);
        return $this->userDao->insert($userArr);
    }
}