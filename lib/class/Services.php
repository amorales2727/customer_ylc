<?php


    class Services{
        public static function  getServices($locker){
            $services = query("SELECT
                    s.name,
                    s.address,
                    s.address2,
                    s.state,
                    s.city,
                    s.zip_code,
                    s.phone
                FROM
                    services s
                    INNER JOIN customers c on c.id_plan = s.plan
                WHERE s.type = 'flete' AND c.locker = '$locker';", 'ALL');
            return $services;
        }
    }