<?php

    class Shop{
        public static function add($data){
            $data->id = Packages::getNewID();

            self::insertShop($data);
            self::insertItem($data);
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
                id_shop
            )
            VALUES(
                '$data->date_create',
                '$data->url',
                '$data->product_cost',
                '$data->id_shop'
            )");
        }
    }