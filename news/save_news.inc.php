<?php

$title = $news->clearStr($_POST['title']);
$category = $news->clearStr($_POST['category']);
$description = $news->clearStr($_POST['description']);
$source = $news->clearStr($_POST['source']);

if(empty($_POST['title']) or empty($_POST['description'])){
    $errMsg = 'Заполните обязательные поля';
    //exit();
}else{
    $news->saveNews($title, $category, $description, $source);
}
header('Location: ' . $_SERVER['PHP_SELF']);
exit();

