<?php
require_once __DIR__ . '/vendor/autoload.php';

use Demo\Entity\Student;
use Demo\Entity\Banker;
use Demo\Entity\User;

use Demo\Dao\UserDao;
use Demo\Service\Printer;

$users = [];

try {
    // $userSv = new UserService(new UserDao());
    // $userSv->addUser(new User("Danny", "danny@gmail.com", "123danny"));
    $dao = new UserDao();
    $users = $dao->getUsers();

}  catch(\Exception $e) {
    echo 'there is a error'; echo "\n";
    echo $e->getMessage(); echo "\n";
    //throw $e;
}

$pr = new Printer($users);

// $pr->add(new Student('Anna', 33, 'anna@yahoo.de', 'Uni Muen'));
// $pr->add(new Banker('Mueller', 44, 'mueller@yahoo.de', 'SSK Muenchen'));

// try {
//     // $pr->add("some wrong");
// }  catch(\Exception $e) {
//     echo 'there is a error'; echo "\n";
//     echo $e->getMessage(); echo "\n";
//     //throw $e;
// }

echo "\n";
$pr->printAllOnConsole();

// php ./vendor/bin/phpunit tests

