<?php

    class Invoice{
        public static function getAll(){
            $customer = Customers::getSession();
            $invoices = query("SELECT
                    i.id,
                    CONCAT(i.pound_qty, 'lb') as pound,
                    p.tracking,
                    i.total,
                    ist.name as status,
                    ist.id   as id_status,
                    ist.color as status_color
                FROM invoices i
                    INNER JOIN packages p ON i.id_package = p.id
                    INNER JOIN customers c ON c.locker = p.customer_locker
                    INNER JOIN services s ON s.id = p.id_service
                    INNER JOIN invoice_status ist ON ist.id = i.id_status
                WHERE c.locker = '$customer->locker';
            ", 'ALL');

            return $invoices;
        }
    }