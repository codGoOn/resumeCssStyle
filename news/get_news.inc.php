<?php
    $asArr = $news->getNews();
    if(!$asArr){
        $news->_db->lastErrorMsg();
        $errMsg = 'произошла ошибка при выводе новостей ленты';   
    }
    echo 'Всего новостей ' . count($asArr);
    foreach ($asArr as $val){
       $id = $val['id'];
       $title = $val['title'];
       $category = $val['category'];
       $description = nl2br($val['description']);
       $date = date('d-m-Y H:i:s', $val['datetime']);
       echo <<<LABEL
       <hr>
       <h3>$title</h3>
       <p>
           $description<br>[$category] @ $date;
       </p>
       <p align = "right"><a href="news.php?del=$id">Удалить</a></p>
LABEL;
    }
?>