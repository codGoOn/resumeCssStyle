<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User extends AUser{
        public $name;
        public $login;
        public $password;
        public static $counter = 0;


        public function __construct($name, $login, $password) {
            $this->name = $name;
            $this->login = $login;
            $this->password = $password;
            ++self::$counter;
        }
        public function __clone() {
            $this->name = "";
            $this->login = "";
            $this->password = "";
            ++self::$counter;
        }
        public function __destruct() {
            echo "Пользователь {$this->login} удален<br>";
        }
        public function showInfo() {
            echo "<p>Name: $this->name<br>";
            echo "Login: $this->login<br>";
            echo "Password: $this->password<br>";
        }
    }