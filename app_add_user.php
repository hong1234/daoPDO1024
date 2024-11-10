<?php
require_once __DIR__ . '/vendor/autoload.php';

use Demo\Entity\User;
use Demo\Dao\UserDao;

try {
    $dao = new UserDao();
    $dao->insert(new User("Mama", "mama@gmail.com", "mam321"));

}  catch(\Exception $e) {
    echo 'there is a error'; echo "\n";
    echo $e->getMessage(); echo "\n";
    //throw $e;
}

