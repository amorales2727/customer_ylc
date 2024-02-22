<?php

    require_once 'int.php';

    Theme::header([
        'title' => 'Reinicio de contraseña',
        'css' => ['ylc-boxes.min', 'font-awesome.min', 'theme'],
        'base' => '../'
    ]);

    inc('forgotten');

    Theme::footer([
        'js' => ['bundle', 'scripts'],
        'dataJS' => ['forgotten']
    ]);