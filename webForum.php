<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class User{
    public $username = "";
    private $loggedIn = false;
    
    public function logIn() {
        $this->loggedIn = TRUE;
    }
    public function logOut() {
        $this->loggedIn = FALSE;
    }
    public function isloggesIn(){
        return $this->loggedIn;
    }
}
class Admin extends User{
    public function logIn() {
        parent::logIn();
        $filelog = './log';
        if(!file_exists($filelog)){
            mkdir($filelog,0777);
        }
        $data = $this->username.' '.'login in '.date('Y-m-d H:i:s').PHP_EOL;
        file_put_contents('log/admin-log.log', $data, FILE_APPEND);
    }

    public function createForum($nameForum) {
        echo "Админ {$this->username} создал тему: {$nameForum}<br>";
    }
    public function banUser($user) {
        echo "Админ {$this->username} забанил пользователя {$user}<br>";
    }
}
$user = new User();
$user->username = 'John';
$user->logIn();
echo 'Пользователь ' . $user->username . ' сейчас ' . ($user->isloggesIn() ? 'на сайте' : 'вышел из сайта') . '<br>';

$admin = new Admin();
$admin->username = 'Maria';
$admin->logIn();
echo 'Пользователь ' . $admin->username . ' сейчас ' . ($admin->isloggesIn() ? 'на сайте' : 'вышел из сайта') . '<br>';

$admin->createForum('Хочу большие сиськи');
$admin->banUser($user->username);