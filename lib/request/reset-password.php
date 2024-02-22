<?php

    require '../../int.php';

    if(!empty($_POST['token']) and !empty($_POST['password']) and !empty($_POST['password2'])){
        if($_POST['password'] == $_POST['password2']){
            if(strlen($_POST['password']) >= 8 and preg_match('/[A-Z]/', $_POST['password']) ){
                $customer =  Customers::checkTokenResetPassword($_POST['token']);
                if($customer){
                    Customers::changePassword($_POST['password'], $customer->locker);
                    Customers::endTokenResetPassword($_POST['token']);
                } 
            }else{
                JSON([
                    'error' => true,
                    'msg'   => 'La contraseña no cumple con los requisitos',
                    'text'  => 'Longitud mínima 8, mayúsculas y minúscula',
                    'icon'  => 'error',
                    'code'  => 2
                ], 400);
            }
            
        }else{
            JSON([
                'error' => true,
                'msg'   => 'Contraseñas no coinciden',
                'icon'  => 'error',
                'text'  => '',
                'code'  => 2
            ], 400);
        }
        
    }else{
        JSON([
            'error' => true,
            'msg'   => 'Complete todo los campos',
            'icon'  => 'error',
            'text'  => '',
            'code'  => 1
        ], 400);
    }