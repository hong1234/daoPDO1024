<?php
namespace Demo\Entity;

class User implements PrintAble {

    private $name;
    private $email;
    private $password;

    public function __construct(string $name, string $email, string $password){
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function printMySelf(){
        echo '<b>I am a User</b>'.'<br/>';
        echo $this->name.'<br/>';
        echo $this->email.'<br/>';
    }

    public function printMySelfOnConsole(){
        echo "I am a User ---\n";
        echo $this->name; echo "\n";
        echo $this->email; echo "\n";
    }

}
