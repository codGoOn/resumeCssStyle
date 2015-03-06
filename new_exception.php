<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Test{
    public function randNum($x, $y){
        $z = rand($x, $y);
        try {
            if($x == 0){
                throw new Exception("Первая точка входа {$x}");
            }else{
                throw new Exception("Вторая точка входа {$x}");
            }
                
        } catch (Exception $exc) {
            echo "Исключение: " . $exc->getCode() . " : " . $exc->getMessage();
            echo "<br>В строке: " . $exc->getLine();
            echo "<br>В файле: " . $exc->getFile();
            }
            return $z;
        }     
}
$test = new Test();
$test->randNum(0, 45);