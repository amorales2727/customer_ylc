<?php

    class Customers{
        public static function loginCheck($base = ''){
            session_start();
            if(!isset($_SESSION['YLC_BOXES_CUSTOMER'])){
                Header("Location:" . URL_LOGIN);
                die();
            }
        }
        public static function loginCheckDie(){
            session_start();
            if(!isset($_SESSION['YLC_BOXES_CUSTOMER'])){
                die();
            }
        }
        public static function checkTokenAuth($token){
            $resutl = query("SELECT * FROM
                    jwt_storage 
                WHERE
                    token = '$token' 
                and type = 'web' 
                and user_type = 'customer' 
                AND auth = 1 
                AND status = 1;");
            if($resutl){
                return $resutl;
            }else{
                return false;
            }
        }
        public static function tokenAuthEnd($token){
            query("UPDATE
                    jwt_storage
                SET
                    auth = '0',
                    status = '0'
                WHERE token = '$token'
            ");
        }
        public static function getSession(){

            $locker = $_SESSION['YLC_BOXES_CUSTOMER'];
            $customer = query("SELECT
                    c.locker,
                    c.name,
                    c.email,
                    c.phone,
                    c.dni,
                    c.nationality,
                    c.avatar,
                    o.id AS id_office,
                    o.name AS office,
                    p.id as id_provincia,
                    p.name as provincia,
                    d.id as id_distrito,
                    d.name as distrito,
                    co.id as id_corregimiento,
                    co.name as corregimiento,
                    ca.address,
                    ca.	lat,
                    ca.lng
                FROM
                    customers c
                INNER JOIN offices o ON
                    o.id = c.id_office
                LEFT JOIN customer_address ca ON
                    ca.customer_locker = c.locker
                LEFT JOIN provincia p on p.id = ca.id_provincia
                LEFT JOIN distrito d on d.id  = ca.id_distrito
                LEFT JOIN corregimiento co on co.id = ca.id_corregimiento 
                WHERE c.locker = '$locker';");
                
                $customer->avatar = (!empty($customer->avatar)) ? 'img/avatar/' . $customer->locker : '';

            return $customer;
        }
        public static function out(){
            session_start();
            session_destroy();
            header('Location: ./');

        }
        public static function getAvatar($locker){
            $customer = query("SELECT c.avatar as file, c.avatar_type as type FROM customers c WHERE c.locker = '$locker'");
            
            return $customer;
        }
        public static function update($data){
            foreach($data as $key => $val){
                if($key != 'locker'){
                    query("UPDATE customers SET $key = '$val' WHERE locker = '$data->locker'");
                }
            }
        }
        public static function changeAvatar($data){
            $file = uploadTMP($data->tmp_name, $data->name);
            $avatar = file_get_contents($file);
            $conexion = conexion("UPDATE customers SET avatar = :avatar, avatar_type = :avatar_type WHERE locker = :locker");

            $conexion->bindParam(':avatar', $avatar);
            $conexion->bindParam(':avatar_type', $data->type);
            $conexion->bindParam(':locker', $data->locker);

            $conexion->execute();
        }
        public static function updateAddress($data){
            query("DELETE FROM customer_address WHERE customer_locker = '$data->locker'");
            query("INSERT INTO customer_address(
                customer_locker,
                id_provincia,
                id_distrito,
                id_corregimiento,
                address,
                lat,
                lng
                ) VALUES (
                    '$data->locker',
                    '$data->id_provincia',
                    '$data->id_distrito',
                    '$data->id_corregimiento',
                    '$data->address',
                    '$data->lat',
                    '$data->lng'
                )");
        }
    }