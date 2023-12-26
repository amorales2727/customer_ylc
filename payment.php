<?php

    require_once 'int.php';

    Customers::loginCheck();
    $customer = Customers::getSession();
    if(isset($_GET['token']) and Payment::checketHash($_GET['token'])){
        
        
        Theme::header([
            'base' => '../',
            'title' => 'Reportar pago',
            'css' => ['ylc-boxes.min', 'font-awesome.min', 'theme']
        ]);

        inc('payment');

        Theme::footer([
            'js' => ['bundle', 'scripts'],
            'dataJS' => ['payment']
        ]);
    }else{
        header('Location:' . URL_CUSTOMER_SYSTEM);
    }