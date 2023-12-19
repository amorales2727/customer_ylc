<?php

    require '../../int.php';

    Customers::loginCheckDie();

   // PreAlert::verificTracking($_POST['tracking']);

    $_POST['locker'] = $_SESSION['YLC_BOXES_CUSTOMER'];
    $_POST['date_created'] = date('Y-m-d H:i:s');

    PreAlert::Add((object)$_POST);