<?php

    require '../../int.php';

    Customers::loginCheckDie();
    
    PreAlert::verificTracking($_POST['tracking']);

    $_POST['locker'] = $_SESSION['YLC_BOXES_CUSTOMER'];
    $_POST['date_created'] = date('Y-m-d H:i:s');

    $_POST['file'] = file_get_contents(
        uploadTMP(
            $_FILES['file']['tmp_name'],
            $_FILES['file']['name']
        )
    );
    $_POST['file_type'] = $_FILES['file']['type'];

    PreAlert::Add((object)$_POST);

    JSON(['success' => true]);