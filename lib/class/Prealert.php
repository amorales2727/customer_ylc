<?php

    class PreAlert{
        public static function verificTracking($tracking){
            $result = Tracking::add((object)[
                'tracking' => $tracking
            ]);
        }
        public static function add($data){
            
            $db = conexion("INSERT INTO pre_alerts(
                date_create, locker_customer,  tracking, id_category, file, file_type, cost
                    ) VALUES (
                :date_create, :locker_customer, :tracking, :id_category, :file, :file_type, :cost)");
            
            $db->bindParam(':date_create', $data->date_created);
            $db->bindParam(':locker_customer', $data->locker);
            $db->bindParam(':tracking', $data->tracking);
            $db->bindParam(':id_category', $data->id_category);
            $db->bindParam(':file', $data->file);
            $db->bindParam(':file_type', $data->file_type);
            $db->bindParam(':cost', $data->cost);
            
            $db->execute();
        }
        public static function getAll(){
            $locker = Customers::getSession()->locker;
            $Prealerts = query("SELECT
	                pa.tracking,
 	                concat('assets/img/courier/', lower(cc.name), '.png') as logo_carrier,
 	                pa.date_create as date,
                    pa.cost,
                    cc.keys as courier_code
                from
	                pre_alerts pa
                    inner join tracking t on
	                t.number = pa.tracking
                inner join courier_companies cc on cc.keys = t.carrier
                where  pa.locker_customer = '$locker'
            ", 'all');

            return $Prealerts;
        }
    }