<?php

    require_once 'int.php';

    Customers::loginCheck();

    $customer = Customers::getSession();

    Theme::header([
        'title' => 'Mis Pre-Alertas',
        'css' => ['ylc-boxes.min', 'font-awesome.min', 'theme']
    ]);

    inc('pre-alert-list');

    Theme::footer([
        'js' => ['bundle', 'scripts'],
        'dataJS' => ['pre-alert']
    ]);