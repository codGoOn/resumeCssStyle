<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function __autoload($classname){
    $filename = $classname . '.php';
    require($filename);
}
class User{
    protected $_user_id;
    protected $_user_email;
    protected $_usser_password;
    
    public function __construct($id) {
        $user_record = self::_getUserId($id);
        $this->_user_id = $user_record['id'];
        $this->_user_email = $user_record['email'];
        $this->_usser_password = $user_record['password'];
    }
    public function __get($name) {
        
    }
    public function __set($name, $value) {
        
    }
    private static function _validateUserId($id){
        if(!is_integer($id) && $id != 'error'){
            throw new Exception('Тип данных id пользователя не соответствует integer');
        }
        return $id;
    }

    private static function _getUserId($id){
        $user_record = array();
        $id = self::_validateUserId($id);
        switch ($id) {
            case 1:
                $user_record['id'] = 1;
                $user_record['email'] = 'vasia@mail.ru';
                $user_record['password'] = 'qwerty';
                break;
            case 2:
                $user_record['id'] = 2;
                $user_record['email'] = 'petia@mail.ru';
                $user_record['password'] = 'cvbfVC53g';
                break;
            case 'error':
                throw new Exception('Ошибка SQL библиотеки');
                break;
        }
        return $user_record;
    }
}
try {
    $user = new User(1);
    $user1 = new User('qwe');
    
} catch (Exception $exc) {
    //echo 'Ошибка типа данных идентификатора пользователя' . $exc->getCode() . '<br>';
    //echo 'В строке ' . $exc->getLine() . "<br>";
    //echo $exc->getTraceAsString();
    echo UserErrors::_codeMessageError(10001);
}