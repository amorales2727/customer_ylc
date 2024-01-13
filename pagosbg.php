<?php

    require 'int.php';



    if (isset($_GET['orderId']) && isset($_GET['status']) && isset($_GET['domain']) && isset($_GET['hash'])) {
        $success = Yappi::validateHash();
        if ($success) {

            if($_GET['status'] == 'E') {
                $invoice = Invoice::getById($_GET['orderId']);
                Invoice::updateStatus($invoice->id, 3, $invoice->total);
                Yappi::setPayment((object) array(
                    'id_invoice'  => $invoice->id,
                    'amount_paid' => $invoice->total,
                    'balance'     => 0.00,
                    'id_method'   => 3,
                    'num_reference' => $_GET['confirmationNumber'],
                    'id_type'      => 1
                ));
            }
            JSON(['success' => true]);
        }
    }