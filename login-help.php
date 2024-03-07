<?php

    require 'int.php';
    
    if(isset($_GET['token'])){
        Customers::loginHelp((object) $_GET);
    }
    header('Location: ' . URL_CUSTOMER_SYSTEM);