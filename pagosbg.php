<?php

    require 'int.php';

    if (isset($_GET['orderId']) && isset($_GET['status']) && isset($_GET['domain']) && isset($_GET['hash'])) {

        $data = Payment::getInvoiceHash($_GET['hash']);
        
        if ($data) {
            Payment::disableToken($data->token);
            if($_GET['status'] == 'E') {
                Invoice::updateStatus($data->id, 3);
                Yappi::setPayment((object) array(
                    'id_invoice'  => $data->id,
                    'amount_paid' => $data->total,
                    'balance'     => 0.00,
                    'id_method'   => $data->id_method,
                    'num_reference' => $_GET['confirmationNumber'],
                    'id_type'      => 1
                ));
            }
        }
    }