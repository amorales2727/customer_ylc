<?php

    class Packages{
        public static function getAll(){
            $user = Customers::getSession();
            $packages = query("SELECT
                    ps.id,
                    CONCAT('assets/img/courier/', LOWER(cc.name), '.png') as carrier_logo,
                    ps.tracking,
                    ps.photo,
                    CONCAT(p.pound, ' lb') as pound,
                    pst.name as status,
                    pst.color as status_color,
                    i.total,
                    ps.type,
                    i.id as invoice
                FROM
                    packages_sub ps
                    INNER JOIN packages p ON p.id = ps.parent
                    inner join courier_companies cc on cc.id = ps.id_carrier
                    inner join packages_status pst on pst.id = ps.status
                    inner join invoices i on i.id_package = p.id
                WHERE
                    p.customer_locker = '$user->locker' ORDER BY ps.date_create DESC
            ",'ALL');
            foreach($packages as $key => $package){
                $package->photo =  (empty($package->photo)) ? '' : 'img/packages/' . $package->id;
            }
            
            return $packages;
        }
        public static function getPhoto($id){
            $photo = query("SELECT photo as file, photo_type as type FROM packages_sub WHERE id = '$id';");
            
            return $photo;

        }
        public static function gettPackagingTypeSelect(){
            $packaging_type = query("SELECT id, name AS text FROM packaging_type", 'ALL');

            return $packaging_type;
        }
        public static function getCategorySelect(){
            $packaging_categories = query("SELECT id, name AS text FROM packages_category", 'ALL');
        
            return $packaging_categories;
        }
        public static function getNewID(){
            $TABLE_SCHEMA = dbname;
            $TABLE_NAME   = 'packages';
            $response = query("SELECT AUTO_INCREMENT AS value FROM information_schema.TABLES WHERE TABLE_SCHEMA = '$TABLE_SCHEMA' AND TABLE_NAME = '$TABLE_NAME'");

            return $response->value;
        }
    }