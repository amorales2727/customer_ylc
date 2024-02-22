<?php

    require_once 'int.php';

    Theme::header([
        'title' => 'Login',
        'css' => ['ylc-boxes.min', 'font-awesome.min', 'theme']
    ]);

    inc('login');

    Theme::footer([
        'js' => ['bundle', 'scripts'],
        'dataJS' => ['login']
    ]);