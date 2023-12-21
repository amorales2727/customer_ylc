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
                    ist.color as status_color,
                    sha2(concat(c.locker, i.id), 256) as token
                FROM invoices i
                    INNER JOIN packages p ON i.id_package = p.id
                    INNER JOIN customers c ON c.locker = p.customer_locker
                    INNER JOIN services s ON s.id = p.id_service
                    INNER JOIN invoice_status ist ON ist.id = i.id_status
                WHERE c.locker = '$customer->locker';
            ", 'ALL');

            return $invoices;
        }
        public static function getBytoken($token){
            $token = preg_replace('/[^\da-zA-Z]/', '', $token);
            $invoice = query("SELECT
                    i.id,
                    i.date_create,
                    s.name as service,
                    p.tracking,
                    i.price_pound,
                    i.pound_qty,
                    i.total_pound,
                    i.price_volumen,
                    i.square_meter,
                    i.total_volumen,
                    i.sub_total,
                    i.itbms,
                    i.total,
                    sha2(concat(c.locker, i.id), 256) as token
                from invoices i
                inner join packages p  on i.id_package = p.id 
                inner join customers c on c.locker = p.customer_locker
                inner join services s  on s.id = p.id_service 
                where sha2(concat(c.locker, i.id), 256) = '$token'
            ");
            
            return $invoice;
        }
    }