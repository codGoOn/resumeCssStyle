<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$arr = array();
$str = 'Come to me baby';
for($i = strlen($str)-1; $i >= 0; $i--){
    $arr[] = $str[$i];
}
foreach ($arr as $val){
    echo $val . '<br>';
}
//echo var_dump($arr);