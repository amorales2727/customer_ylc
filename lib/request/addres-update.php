<?php

    require '../../int.php';

    Customers::loginCheckDie();

    $_POST['locker'] = $_SESSION['YLC_BOXES_CUSTOMER'];

    Customers::updateAddress((object) $_POST);