<?php

use PHPUnit\Framework\TestCase;

use Demo\Service\Printer;
use Demo\Entity\Student;
use Demo\Entity\Banker;
use Demo\Entity\User;
use Demo\Dao\DbConnect;
use Demo\Dao\UserDao;

class DatabaseTest extends TestCase
{
    //private $pri;

    protected function setUp() : void { 
        // echo "\n";
        // echo "hello-1";echo "\n";
    }

    protected function tearDown(): void{
    }
    
    /*
    public function testPushAndPop(){
        $stack = [];
        $this->assertSame(0, count($stack));
        array_push($stack, 'foo');
        $this->assertSame('foo', $stack[count($stack)-1]);
        $this->assertSame(1, count($stack));
        $this->assertSame('foo', array_pop($stack));
        $this->assertSame(0, count($stack));
        echo "hello-2";echo "\n";
    }*/
    
    public function testAddPerson(){
        $pri = new Printer();

        $pri->add(new Student('Anna4', 33, 'anna@yahoo.de', 'Uni Muen'));
        $student = $pri->getTop();
        $this->assertEquals($student->getEmail(), "anna@yahoo.de");
        $this->assertEquals($student->getUni(), "Uni Muen");

        $pri->add(new Banker('Bill4', 44, 'bill@yahoo.de', 'SSK Muenchen'));
        $banker = $pri->getTop();
        $this->assertEquals($banker->getEmail(), "bill@yahoo.de");
        $this->assertEquals($banker->getCompany(), "SSK Muenchen");

        // echo "hello-3"; echo "\n";
    }

    public function testUniqueness()
    {
        $dao1 = new UserDao();
        $dao2 = new UserDao();
        $this->assertSame($dao1->getPDO(), $dao2->getPDO());
    }

    public function testGetUserById()
    {
        // $user = new User("Tommy", "tommy@yahoo.de", ""); // UserId = 2
        $dao = new UserDao();
        $this->assertSame("tommy@yahoo.de", $dao->getUserById(2)->getEmail());
    }

    // public function testInsert()
    // {
    //     $dao = new UserDao();
    //     $user = new User("Test3--", "test3--@yahoo.de", "test3--");
    //     $id = $dao->insert($user);
    //     $this->assertSame($user->getEmail(), $dao->getUserById($id)->getEmail());
    // }
}
