<?php

    require '../int.php';

    Customers::loginCheckDie('', true);

    switch($_GET['type']){
        case 'avatar':
                $img = Customers::getAvatar($_GET['id']);
                break;
        case 'packages':
                $img = Packages::getPhoto($_GET['id']);
                break;
        default: $img = false;
            break;
    }

    if($img){
        header("Content-Type: $img->type");
        echo $img->file;
    }