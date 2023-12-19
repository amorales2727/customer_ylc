<?php

    require_once 'int.php';

    Customers::loginCheck();

    $customer = Customers::getSession();

    Theme::header([
        'title' => 'Account Setting.php',
        'css' => ['ylc-boxes.min', 'font-awesome.min', 'intlTelInput', 'theme'],
        'externalJS' => [
            [
                'https://maps.googleapis.com/maps/api/js?key=AIzaSyAV8Xu5veeVF9GrJ8S-_k61BA3MiUELE7I',
            ]
        ]
    ]);

    inc('account-setting');

    Theme::footer([
        'js' => ['bundle', 'scripts'],
        'dataJS' => ['account-setting']
    ]);