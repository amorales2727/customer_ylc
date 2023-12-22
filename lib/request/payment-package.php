<?php

    require '../../int.php';

    Customers::loginCheckDie();

    $invoice = Invoice::getBytoken($_POST['token']);
    $payment_method = $_POST['payment_method'];

    switch($payment_method){
        case '3':
            Yappi::sendPayment((object) [
                'total'    => $invoice->total,
                'subtotal' => $invoice->sub_total,
                'taxes'    => $invoice->itbms,
                'id_invoice' => $invoice->id
                
            ]);
            break;
        default:
            //functin
            break;
    }
