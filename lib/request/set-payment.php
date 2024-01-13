<?php

    require '../../int.php';
    $_POST['date_created'] = date('Y-m-d H:i:s');
    
    Customers::loginCheckDie();

    $inputError = [];

    if(empty($_POST['num_reference'])){
        array_push($inputError, array(
            'id' => '#num_reference'
        ));
    }
    if(empty($_POST['amount_paid'])){
        array_push($inputError, array(
            'id' => '#amount_paid'
        ));
    }
    if(empty($_FILES['file']['name'])){
        array_push($inputError, array(
            'id' => '.payment-upload-content'
        ));
    }

    $invoice = Payment::getInvoiceHash($_POST['token']);

    //JSON($invoice);

    

    if(!empty($inputError)){
        JSON($inputError, 400);
    }else{
        $_POST['voucher']      = file_get_contents(uploadTMP($_FILES['file']['tmp_name'], $_FILES['file']['name']));
        $_POST['voucher_size'] = $_FILES['file']['size'];
        $_POST['voucher_type'] = $_FILES['file']['type']; 
        $_POST['id_invoice']   = $invoice->id;
        $_POST['balance']      = $invoice->balance - $_POST['amount_paid'];
        $_POST['id_type']      = ($_POST['balance'] == 0.00) ? 1 : 2;
        $_POST['id_method']    = 2;
        $_POST['status']       = 3;
        Payment::addPayment((object) $_POST);
    }
        