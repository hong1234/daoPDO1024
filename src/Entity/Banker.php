<?php
namespace Demo\Entity;

use Demo\Entity\Person;
use Demo\Entity\PrintAble;

class Banker extends Person implements PrintAble
{
    private $company;

    public function __construct(string $name, int $age, string $email, string $company){
        parent::__construct($name, $age, $email);
        $this->company = $company;
    }

    function getCompany(){
        return $this->company;
    }

    function setCompany($company){
        $this->company = $company;
    }

    public function printMySelf(){
        echo '<b>I am a Banker</b>'.'<br/>';
        echo $this->name.'<br/>';
        echo $this->age.'<br/>';
        echo $this->email.'<br/>';
        echo $this->company.'<br/>'.'<br/>';
    }

    public function printMySelfOnConsole(){
        echo 'I am a Banker ---';echo "\n";
        echo $this->name;echo "\n";
        echo $this->age;echo "\n";
        echo $this->email;echo "\n";
        echo $this->company;echo "\n";
    }

}
