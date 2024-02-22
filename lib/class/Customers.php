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
                    c.address,
                    c.lat,
                    c.lng
                FROM
                    customers c
                INNER JOIN offices o ON
                    o.id = c.id_office
                LEFT JOIN provincia p on p.id = c.id_provincia
                LEFT JOIN distrito d on d.id  = c.id_distrito
                LEFT JOIN corregimiento co on co.id = c.id_corregimiento 
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
            foreach($data as $key => $val){
                if($key != 'locker'){
                    query("UPDATE customers SET $key = '$val' WHERE locker = '$data->locker'");
                }
            }
        }
        static function changePassword($password, $locker){

            $password = passwordEncripted($password);

            $conexion = conexion("UPDATE customers SET password = '$password' WHERE locker = '$locker'");

            $conexion->execute();
        }
        static function checkTokenResetPassword($token){
            $user = query("SELECT
                    c.locker
                FROM forget_token ft 
                INNER JOIN customers c ON c.locker = ft.locker
                WHERE  ft.token = '$token' and ft.status = 1");
            return $user;
        }
        static function endTokenResetPassword($token){
            query("DELETE FROM forget_token WHERE token = '$token'");
        }
        static function login($data){
            $inputError =[];
            if(empty($data->username)){
                array_push($inputError, ['key' => 'username']);
            }
            if(empty($data->password)){
                array_push($inputError, ['key' => 'password']);
            }
            if(count($inputError) > 0){
                JSON([
                    'error' => true,
                    'msg'   => 'complete todo los campos',
                    'icon'  => 'error',
                    'input' => $inputError
                ], 400);
            }else{
                $data->username = self::removeAcromin($data->username);
                $customer = query("SELECT locker, email, password FROM customers WHERE email = '$data->username' or locker = '$data->username' limit 1");
                if($customer and password_verify($data->password, $customer->password)){
                    session_start();
                    $_SESSION['YLC_BOXES_CUSTOMER'] = $customer->locker;
                    JSON(['error' => false, 'login' => true, 'url' => URL_CUSTOMER_SYSTEM]);
                }else{
                    JSON([
                        'error' => true,
                        'msg'   => 'Usuario o contraseña son incorrectos',
                        'icon'  => 'error',
                    ], 400);
                }
            }
        }
        private static function removeAcromin($locker){
            $chronym = [strtolower(chronym_locker), strtoupper(chronym_locker)];
            $locker = str_replace($chronym, '', $locker);

            return $locker;
        }
    }