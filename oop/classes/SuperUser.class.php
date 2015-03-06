<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class SuperUser extends User implements ISuperUser{
        public $role;
        public static $counter = 0;
     
        public function __construct($name, $login, $password, $role) {
            parent::__construct($name, $login, $password);
            $this->role = $role;
            ++self::$counter;
            --parent::$counter;
        }
        public function showInfo() {
            parent::showInfo();
            echo "Role: $this->role<br>";
        }
        public function getInfo() {
            $arr = array();
            foreach ($this as $key => $val)
                $arr[$key] = $val;
                var_dump($arr);
            return $arr;
        }
    }
