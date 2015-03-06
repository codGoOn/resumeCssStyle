<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Human{
    private $name;
    private $age;
    
    public function __construct($name, $age) {
        $this->setName($name);
        $this->setAge($age);
    }
    
    public function setName($name){
        if(empty($name)){
            echo 'Введите имя';
            exit();
        }else{
           $this->name = trim($name);
        }  
    }
    public function setAge($age){
        if(empty($age) && $age<0 && $age>120){
            echo 'Введите правильный возраст';
            exit();
        }else {
            $this->age = trim(abs($age)); 
        }
    }
    public function getName(){
        echo 'Ваше имя ';
        return $this->name;
    }
    public function getAge(){
        echo '<br>Ваш возраст ';
        return $this->age;
    }        
}
$human = new Human('dcdf', -45 );
