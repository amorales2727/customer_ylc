<?php

    require '../../int.php';
    if(isset($_GET['type']) and isset($_GET['id'])){
        $id = $_GET['id'];
        switch($_GET['type']){
            case 'package':
                $photo = query("SELECT * FROM packages_photos WHERE id = '$id'");
                break;
            case 'payment':
                $photo = query("SELECT voucher as file, voucher_type as type FROM payment WHERE id = '$id'");
                break;
            case 'signature':
                $photo = query("SELECT signature as file, signature_type as type FROM package_deliveries_info WHERE id = '$id'");
                break;
            case 'delivery_photo':
                $photo = query("SELECT photo as file, photo_type as type FROM package_deliveries_info WHERE id = '$id'");
                    break;
        }


        if($photo){
            header("Content-Type: $photo->type");
            echo $photo->file;
        }
    }