<?php

    require '../int.php';
    
    $img = Packages::getPhoto($_GET['id']);
    
    if($img){
        header("Content-Type: $img->type");
        echo $img->file;
    }