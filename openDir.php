<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$curdir="C:\log";

if(!chdir($curdir))
{
print("Couldn't change directory!!");
}
else
{
$wkdir = getcwd();
$curdir = $wkdir;
}
