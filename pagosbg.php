<?php

    require 'int.php';



    if (isset($_GET['orderId']) && isset($_GET['status']) && isset($_GET['domain']) && isset($_GET['hash'])) {
        
        if (Yappi::validateHash()) {

            if($_GET['status'] == 'E') {
                $invoice = Invoice::getById($_GET['orderId']);
                Invoice::updateStatus($data->id, 3);
                Yappi::setPayment((object) array(
                    'id_invoice'  => $data->id,
                    'amount_paid' => $data->total,
                    'balance'     => 0.00,
                    'id_method'   => 3,
                    'num_reference' => $_GET['confirmationNumber'],
                    'id_type'      => 1
                ));
            }
        }
    }