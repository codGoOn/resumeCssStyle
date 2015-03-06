<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Animal {

    public $name;

    public function __construct($num = 0) {
        try {
            if (!$num)
                throw new Exception("Нет номера!<br>");
            echo "Object {$num} created<br>";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function __destruct() {
        echo "Object deleted<br>";
    }

    public function __clone() {
        echo "Object cloned<br>";
    }

    public function sayHello($param) {
        echo $this->name . " сказал " . $param;
        $this->br();
    }

    public function br() {
        echo "<br/>";
    }

}

$cat = new Animal(0);
$dog = new Animal(2);
$newDog = clone $dog;

$cat->name = "Мурзик";
$cat->sayHello("Мяу!");

$dog->name = "Шарик";
$dog->sayHello("Гав!");
