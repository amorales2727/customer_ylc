<?php

    require_once 'int.php';

    if(isset($_GET['token']) and Customers::checkTokenAuth($_GET['token'])){
        session_start();
        $token = Customers::checkTokenAuth($_GET['token']);
        $_SESSION['YLC_BOXES_CUSTOMER'] = $token->customers;
        Customers::tokenAuthEnd($_GET['token']);
        Header('Location:' . URL_CUSTOMER_SYSTEM);
    }else{
        Header("Location:" . URL_LOGIN);
    }