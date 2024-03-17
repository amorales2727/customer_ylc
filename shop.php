<?php

    require_once 'int.php';

    Customers::loginCheck();

    $customer = Customers::getSession();

    Theme::header([
        'title' => 'Servicio de compras',
        'css' => ['ylc-boxes.min', 'font-awesome.min', 'theme']
    ]);

    inc('shop');

    Theme::footer([
        'js' => ['bundle', 'scripts'],
        'dataJS' => ['shop']
    ]);