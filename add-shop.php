<?php

    require_once 'int.php';

    Customers::loginCheck();

    $customer = Customers::getSession();

    Theme::header([
        'title' => 'Solicitar cotización',
        'css' => ['ylc-boxes.min', 'font-awesome.min', 'theme']
    ]);

    inc('add-shop');

    Theme::footer([
        'js' => ['bundle', 'scripts'],
        'dataJS' => ['add-shop']
    ]);