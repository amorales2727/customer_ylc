<?php

    require_once 'int.php';

    Customers::loginCheck();

    $customer = Customers::getSession();

    Theme::header([
        'title' => 'PreAlertar Paquete',
        'css' => ['ylc-boxes.min', 'font-awesome.min', 'theme']
    ]);

    inc('pre-alert-add');

    Theme::footer([
        'js' => ['bundle', 'scripts'],
        'dataJS' => ['pre-alert-add']
    ]);