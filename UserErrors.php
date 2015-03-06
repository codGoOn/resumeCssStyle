<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserErrors extends Exception{
    
    const INVALIDID = 10001;
    const INVALIDEMAIL = 10002;
    const INVALIDPASSWORD = 10003;
    const DOESNOTEXIST = 10004;
    const NOTASETTING = 10005;
    const UNEXPACTEDERROR = 10006;
    
    public static function _codeMessageError($code){
        switch ($code) {
            case self::INVALIDID:
                echo 'Не верный идентификатор пользователя';
                break;
            case self::INVALIDEMAIL:
                echo 'Не верный email пользователя';
                break;
            case self::INVALIDPASSWORD:
                echo 'Не верный пароль пользователя';
                break;
            case self::DOESNOTEXIST:
                echo 'Такого пользователя не существует';
                break;
            case self::NOTASETTING:
                echo 'Не верные настройки';
                break;
            case self::UNEXPACTEDERROR:
                echo 'Неизвестная ошибка';
                break;

        }
    }
}