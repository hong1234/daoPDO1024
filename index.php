<?php
require_once __DIR__ . '/vendor/autoload.php';

use Demo\Entity\User;
use Demo\Dao\UserDao;

try {
    $dao1 = new UserDao();

    // var_dump($dao1->getPDO());

    // $dao2 = new UserDao();

    // var_dump($dao2->getPDO());

} catch(\Exception $e) {
    echo "SOMETHING wrong: " . $e->getMessage();
}

