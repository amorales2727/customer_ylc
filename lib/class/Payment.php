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
        
    }