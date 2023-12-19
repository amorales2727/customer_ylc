<?php

    class PreAlert{
        public static function verificTracking($tracking){
            $result = Tracking::add((object)[
                'tracking' => $tracking
            ]);
        }
        public static function add($data){
            $db = conexion("INSERT INTO pre_alerts(
                date_create, locker_customer,  tracking, id_category
                    ) VALUES (
                :date_create, :locker_customer, :tracking, :id_category)");
            
            $db->bindParam(':date_create', $data->date_create);
            $db->bindParam(':locker_customer', $data->locker);
            $db->bindParam(':tracking', $data->tracking);
            $db->bindParam(':id_category', $data->id_category);
            
            $db->execute();
            JSON($db->errorInfo());
        }
    }