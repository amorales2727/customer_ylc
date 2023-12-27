<?php

    require 'int.php';

    $r = query("SELECT i.id, sha2(concat(c.locker, i.id), 256) as token FROM invoices i INNER JOIN packages p on p.id = i.id_package INNER JOIN customers c ON c.locker = p.customer_locker INNER JOIN payment_hash ph on ph.invoice_token != sha2(concat(c.locker, i.id), 256);");

    json($r);