<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class NewClass{
    private $login;
    private $password;
    private $homepage;
    
    public function __construct($log, $pas, $page) {
        $this->login = $log;
        $this->password = $pas;
        $this->homepage = $page;
    }
    public function __destruct() {}

    public function showInf() {
        echo 'Логин: ' . $this->login . '<br>';
        echo 'Пароль: ' . $this->password . '<br>';
        echo 'URL: ' . $this->homepage . '<br>';
    }
}
$new = new NewClass('vasia', 'qwerty', 'www.site.ru');
$new->showInf();
