<?php

    require_once 'int.php';

    Customers::loginCheck();

    $customer = Customers::getSession();

    Theme::header([
        'title' => 'Package',
        'css' => ['ylc-boxes.min', 'font-awesome.min', 'yappy-styles', 'theme']
    ]);

    inc('invoice');

    Theme::footer([
        'js' => ['bundle', 'scripts'],
        'dataJS' => ['invoice'],

    ]);