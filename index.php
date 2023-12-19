<?php

    require_once 'int.php';

    Customers::loginCheck();

    $customer = Customers::getSession();

    Theme::header([
        'title' => 'Dashboard',
        'css' => ['ylc-boxes.min', 'font-awesome.min', 'theme']
    ]);

    inc('index');

    Theme::footer([
        'js' => ['bundle', 'scripts'],
        'dataJS' => ['dashboard']
    ]);