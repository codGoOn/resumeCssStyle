<?php

$title = $news->clearForm($_POST['title']);
$category = $news->clearForm($_POST['category']);
$description = $news->clearForm($_POST['description']);
$source = $news->clearForm($_POST['source']);

if(empty($title) or empty($description)){
    $errMsg = 'Заполните обязательные поля';
    //exit();
}else{
    $news->saveNews($title, $category, $description, $source);
}
header('Location: ' . $_SERVER['PHP_SELF']);
exit();

