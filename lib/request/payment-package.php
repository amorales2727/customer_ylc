<?php

    require '../../int.php';

    Customers::loginCheckDie();

    $invoice = Invoice::getBytoken($_POST['token']);
    
    $payment_method = $_POST['payment_method'];

    switch($payment_method){
        case '3':
            $datos_pay = (object) [
                'total'    => $invoice->total,
                'subtotal' => (empty($invoice->discount)) ? $invoice->sub_total : $invoice->sub_total - $invoice->discount,
                'taxes'    => $invoice->itbms,
                'id_invoice' => $invoice->num_order,
                'token_invoice' => $invoice->token
                
            ];
            $result = Yappi::sendPayment($datos_pay);
            if(isset($result->url)){
                JSON($result);
            }else{
                JSON(['error' => true, 'result' =>$result], 400);
            }
            break;
        default:
            $result = Payment::genUrl($invoice->id, $invoice->customer_locker, $invoice->token);
            JSON($result);
            break;
    }
