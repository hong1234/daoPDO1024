<?php
namespace Demo\Entity;

class Person {

    public $name;
    public $age;
    public $email;

    public function __construct(string $name, int $age, string $email){
        $this->name = $name;
        $this->age = $age;
        $this->email = $email;
    }

    function getName(){
        return $this->name;
    }

    function setName($name){
        $this->name = $name;
    }

    function getAge(){
        return $this->age;
    }

    function setAge($age){
        $this->age = $age;
    }

    function getEmail(){
        return $this->email;
    }

    function setEmail($email){
        $this->email = $email;
    }
    
}