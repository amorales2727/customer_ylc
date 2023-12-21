<?php

    require_once 'int.php';

    Customers::loginCheck();

    $customer = Customers::getSession();
    $invoice  = Invoice::getByToken($_GET['token']);

    Theme::header([
        'base' => '../../',
        'title' => 'CheckOut',
        'css' => ['ylc-boxes.min', 'font-awesome.min', 'theme']
    ]);

    inc('package-checkout');

    Theme::footer([
        'js' => ['bundle', 'scripts'],
        'dataJS' => ['checkout']
    ]);