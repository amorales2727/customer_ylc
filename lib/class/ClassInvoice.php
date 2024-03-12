<?php

    class Invoice{
        public static function getAll(){
            $customer = Customers::getSession();
            $invoices = query("SELECT
                    i.id,
                    CONCAT(i.pound_qty, 'lb') as pound,
                    i.total,
                    ist.name as status,
                    ist.id   as id_status,
                    ist.color as status_color,
                    sha2(concat(c.locker, i.id), 256) as token,
                    p.id as package
                FROM invoices i
                    INNER JOIN packages p ON i.id_package = p.id
                    INNER JOIN customers c ON c.locker = p.customer_locker
                    INNER JOIN services s ON s.id = p.id_service
                    INNER JOIN invoice_status ist ON ist.id = i.id_status
                WHERE c.locker = '$customer->locker' and ist.id NOT IN (4);
            ", 'ALL');

            foreach($invoices as $i){
                $i->pkg = query("SELECT
                        p.id,
                        cc.id   as id_carrier,
                        CONCAT('assets/img/courier/', LOWER(cc.name), '.png') as logo_courier,
                        cc.name as carrier,
                        p.tracking
                    from
                        packages_sub p
                    left join courier_companies cc on
                        cc.id = p.id_carrier
                    where
                        p.parent = '$i->package'", 'ALL');
            }

            return $invoices;
        }
        public static function getBytoken($token){
            $token = preg_replace('/[^\da-zA-Z]/', '', $token);
            $invoice = query("SELECT
                    i.id,
                    i.id_package,
                    concat('INV', i.id) as num_order,
                    i.discount,
                    i.date_create,
                    s.name as service,
                    p.customer_locker,
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

            if($invoice){
                $invoice->subItems = self::getSubItems($invoice->id_package);
                $invoice->packs     = Packages::getSubPack($invoice->id_package);
            }

            return $invoice;
        }
        private static function getSubItems($id_package){
            $sub = query("SELECT * FROM invoice_subservice WHERE id_package = '$id_package'", 'ALL');

            return $sub;
        }
        public static function updateStatus($id, $status){
            query("UPDATE invoices SET id_status = '$status', balance = 0.00 WHERE id = '$id'");
        }
        public static function getById($id){
            $id = str_replace(['-', 'QT', 'PKG', ' ', ], '', $id);
            $result = query("SELECT
                    i.id,
                    i.total
                FROM
                    invoices i
                INNER JOIN packages p ON p.id = i.id_package
                INNER JOIN customers c ON c.locker = p.customer_locker 
                WHERE i.id = '$id';");
            
            return $result;
        }
    }