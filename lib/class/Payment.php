<?php

    class Payment{
        public static function metodAllSelect(){
            $method = query("SELECT
                    id,
                    name as text,
                    concat('assets/img/', logo) as logo,
                    icon,
                    style
                FROM payment_method
                where customer_pay = 1;
            ", 'ALL');
            
            return $method;
        }
        public static function genUrl($id_invoice, $locker):object{
            $result = (object)[];
            $token = sha1(date('Y-m-d H:i:s') . $id_invoice . $locker);
            self::setHash(2, $token, 2);
            $result->url = URL_CUSTOMER_SYSTEM . 'payment/' . $token;
            return $result;
        }
        public static function checketHash($hash){
            $result = query("SELECT * FROM payment_hash WHERE token = '$hash' and status = 1");
            
            $val  = ($result) ? $result : false;
            return $val;
        }
        public static function setHash($id_method, $token, $invoice_token){
            $date_create = date('Y-m-d H:i:s');
            query("INSERT INTO payment_hash(
                date_create, id_method, token, invoice_token
                )value (
                '$date_create', '$id_method', '$token', '$invoice_token')"
            ,);
        }
    }