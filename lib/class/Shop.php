<?php

    class Shop{
        public static function add($data){
            $data->id = Packages::getNewID();
            query("INSERT INTO packages(
                    id, customer_locker, id_category, date_create, type, url,  product_cost, status
                ) VALUES (
                    '$data->id','$data->locker', '$data->id_category',  '$data->date_created', 'QT','$data->url','$data->product_cost',   16)");
            JSON(['success' => true, 'icon' => 'success', 'msg' => 'Solicitud de cotización relizada']);
        }
        public static function getAll(){
            $locker = Customers::getSession()->locker;
            $quote = query("SELECT
                    p.id,
                    p.url,
                    p.product_cost,
                    ps.name as status,
                    ps.color as status_color,
                    i.total
                FROM packages p
                inner join packages_status ps on p.status = ps.id
                left join invoices i on i.id_package = p.id
                WHERE p.type = 'QT' and customer_locker = '$locker'"
            , 'ALL');

            return $quote;
        }
    }