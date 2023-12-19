<?php

    require '../../int.php';

    Customers::loginCheckDie();

    $_FILES['avatar']['locker'] = $_SESSION['YLC_BOXES_CUSTOMER'];

    Customers::changeAvatar((object) $_FILES['avatar']);