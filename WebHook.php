<?php

    $data = [
        'GET' => $_GET,
        'POST' => $_POST, 
    ];

    $data_json = json_encode($data);

    $file_name = 'logs/' . date('d-m-Y-h-i-s') . '.json';
    file_put_contents($file_name, $data_json);