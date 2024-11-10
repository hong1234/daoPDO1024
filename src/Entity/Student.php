<?php
namespace Demo\Entity;

use Demo\Entity\Person;
use Demo\Entity\PrintAble;

class Student extends Person implements PrintAble
{
    private $uni;

    public function __construct(string $name, int $age, string $email, string $uni){
        parent::__construct($name, $age, $email);
        $this->uni = $uni;
    }

    function getUni(){
        return $this->uni;
    }

    function setUni($uni){
        $this->uni = $uni;
    }

    public function printMySelf(){
        echo '<b>I am a Student</b>'.'<br/>';
        echo $this->name.'<br/>';
        echo $this->age.'<br/>';
        echo $this->email.'<br/>';
        echo $this->uni.'<br/>'.'<br/>';
    }

    public function printMySelfOnConsole(){
        echo 'I am a Student ---';echo "\n";
        echo $this->name;echo "\n";
        echo $this->age;echo "\n";
        echo $this->email;echo "\n";
        echo $this->uni;echo "\n"; 
    }

}

