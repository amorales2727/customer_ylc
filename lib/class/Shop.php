<?php

    class Shop{
        public static function add($data){
            $data->id = Packages::getNewID();

            self::insertShop($data);
            self::insertItem($data);
            
            return self::getByID($data->id);
        }
        public static function getAll(){
            $locker = Customers::getSession()->locker;
            $quote = query("SELECT
                    *
                FROM shop sp
                WHERE sp.customer_locker = '$locker'
            ", 'ALL');

            return $quote;
        }
        private static function insertShop($data){
            query("INSERT INTO shop(
                id, customer_locker, date_create, status
                    ) VALUES (
                '$data->id', '$data->locker', '$data->date_created', 16
            )");
        }
        private static function insertItem($data){
            query("INSERT INTO shop_item(
                date_create,
                url,
                product_cost,
                description,
                id_shop
            )
            VALUES(
                '$data->date_created',
                '$data->url',
                '$data->product_cost',
                '$data->description',
                '$data->id'
            )");
        }
        public static function getById($id){
            $chronym_locker = chronym_locker;
            $shop = query("SELECT
                    p.id,
                    c.locker,
                    c.email as customer_email,
                    c.name as customer_name,
                    c.dni as customer_dni,
                    concat('$chronym_locker', c.locker , ' ', c.name) as customer,
                    i.last_pay,
                    i.total,
                    ps.id as id_status,
                    ps.name as status,
                    ps.color as status_color,
                    p.id_service,
                    i.pound_qty as pound,
                    i.price_pound,
                    i.pound_qty,
                    i.total_pound,
                    i.price_volumen,
                    i.square_meter,
                    i.total_volumen,
                    i.sub_total,
                    i.total,
                    i.id_status as invoice_status,
                    i.itbms,
                    i.id as id_invoice,
                    i.tax_status,
                    i.volumetric_status,
                    i.discount,
                    i.type_discount,
                    i.qty_discount,
                    p.date_create,
                    p.expiration_date,
                    s.name as service
                from
                    shop p
                inner join customers c on
                    c.locker = p.customer_locker
                inner join packages_status ps on ps.id = p.status
                left join services s on s.id = p.id_service
                left join invoices i on i.id_package = p.id
                where
                p.id = '$id'
            ");
            if($shop){
                $shop->items = self::getItems($shop->id);
                $shop->subServices = self::getSubItems($shop->id);
            }
            
            return $shop;
        }
        static function getItems($id_shop){
            $items = query("SELECT * FROM `shop_item` WHERE id_shop = '$id_shop'", 'ALL');
            return $items;
        }
        private static function getSubItems($id_package){
            $sub = query("SELECT 
                    id,
                    id_package,
                    name,
                    cost,
                    total,
                    qty,
                    tax,
                    CASE WHEN allow_delete = 1 THEN 'true' ELSE 'false' END AS allow_delete
                FROM invoice_subservice
                WHERE id_package = '$id_package'", 'ALL');
            return $sub;
        }
        static function sendNotification($data){
            Email::send(
                (object) [
                    'address' => email_request_quote,
                    'data' => (object)[],
                    'id_templente' => 8,
                    'name' => 'YLCBoxes'
                ]
            );
        }
    }