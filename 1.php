<?php

    

    require 'int.php';
    Customers::loginCheck();
    
    JSON(shop::getAll());