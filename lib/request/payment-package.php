<?php

    require '../../int.php';

    Customers::loginCheckDie();

    $invoice = Invoice::getBytoken($_POST['token']);
    $payment_method = $_POST['payment_method'];

    switch($payment_method){
        case '3':
            $result = Yappi::sendPayment((object) [
                'total'    => $invoice->total,
                'subtotal' => $invoice->sub_total,
                'taxes'    => $invoice->itbms,
                'id_invoice' => $invoice->id,
                'token_invoice' => $invoice->token
                
            ]);
            if(isset($result['url'])){
                JSON($result);
            }else{
                JSON(['error' => true, 'result' =>$result], 400);
            }
            break;
        default:
            $result = Payment::genUrl($invoice->id, $invoice->customer_locker);
            JSON($result);
            break;
    }
