<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Human{
    public $men = "Vasia";
}
class Men extends Human{
    
}
$men = new Human();
var_dump($men instanceof Human);
/*if($men->men instanceof Human){
    echo "Вася мужик!";
}  else {
    echo "Не мужик";
}*/
