<?php

    define('VERSION', '1.0.2');

    require_once 'lib/config.php';
    require_once 'lib/class/ClassCore.php';
    require_once 'lib/class/Conexion.php';
    require_once 'lib/functions.php';
    require_once 'lib/class/Customers.php';
    require_once 'lib/class/Theme.php';
    require_once 'lib/class/Services.php';
    require_once 'lib/class/Oficces.php';
    require_once 'lib/class/ClassPackage.php';
    require_once 'lib/class/ClassInvoice.php';
    require_once 'lib/class/Payment.php';
    require_once 'lib/class/Yappy.php';
    require_once 'lib/class/Prealert.php';
    require_once 'lib/class/Tracking.php';

    $config = Core::getConfigAll();

    define('chronym_locker',  $config['chronym_locker']);
    define('password_length', $config['password_length']);
    define('smtp_host',       $config['smtp_host']);
    define('smtp_email',      $config['smtp_email']);
    define('smtp_password',   $config['smtp_password']);
    define('smtp_port',       $config['smtp_port']);
    define('COMPANY',         $config['company']);
    define('WEBSITE',         $config['WEBSITE']);
    define('RUC',             $config['RUC']);
    define('DV',              $config['DV']);
    define('ADDRESS',         $config['address']);
    define('ADDRESS2',        $config['address2']);
    define('STATE',           $config['state']);
    define('CITY',             $config['city']);
    define('QUOTE_EXPIRATION', $config['quote_exppiration']);
    define('LOGO_INVOICE',     dir .'assets/img/logo_invoice.png');