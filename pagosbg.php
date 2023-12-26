<?php

    require 'int.php';

$_GET = array(
    'orderId' => '194',
    'confirmationNumber' => 'CUXGG-18146281',
    'domain' => 'https://customers.ylcboxespanama.com/',
    'status' => 'E',
    'hash' => '44afad1e02c5f0a473c5daa8b8b6ee0feb072207bcc9d685ab24613e7996425c'
);

    if (isset($_GET['orderId']) && isset($_GET['status']) && isset($_GET['domain']) && isset($_GET['hash'])) {
        header('Content-Type: application/json');
        $invoice = Payment::checketHash($_GET['hash']);
        if ($invoice) {
            echo 1;
        }else{
            echo 2;
        }
    }