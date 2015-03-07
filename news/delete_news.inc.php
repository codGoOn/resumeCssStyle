<?php
    $id = $news->clearInt($_GET['del']);
    if($id)
        $news->deleteNews($id);