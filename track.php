<?php

    require_once 'int.php';

    Customers::loginCheck();

    $customer = Customers::getSession();

    Theme::header([
        'title' => 'Package',
        'css' => ['ylc-boxes.min', 'font-awesome.min', 'theme']
    ]);

    inc('track');

    Theme::footer([
        'js' => ['bundle', 'scripts'],
        'dataJS' => ['track']
    ]);