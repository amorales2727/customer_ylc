<?php

    class Payment{
        public static function metodAllSelect(){
            $method = query("SELECT id, name as text FROM payment_method", 'ALL');
            
            return $method;
        }
        
    }