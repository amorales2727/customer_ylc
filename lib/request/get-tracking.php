<?php

    require_once '../../int.php';

    Customers::loginCheckDie();

    Tracking::getInfo(obj($_POST));