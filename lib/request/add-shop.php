<?php

    require '../../int.php';
    $_POST['date_created'] = date('Y-m-d H:i:s');

    $inputEmpty = [
        'form' => [],
        'icon' => '',
        'msg'  => '',
    ];

    function checkValue( array $arr){
        global $inputEmpty;
        foreach($arr as $key){
            if(empty($_POST[$key])){
                array_push($inputEmpty['form'], [
                    'id' => '#' . $key,
                ]);
            }
        }
    }
    Customers::loginCheckDie();
    $_POST['locker'] = $_SESSION['YLC_BOXES_CUSTOMER'];

    checkValue(['url', 'product_cost','id_category']);

    if(empty($inputEmpty['form'])){
        Shop::add((object) $_POST);
    }else{
        $inputEmpty['icon'] = 'error';
        $inputEmpty['msg']  = 'Complete todo los campos';
        JSON($inputEmpty, 400);
    }