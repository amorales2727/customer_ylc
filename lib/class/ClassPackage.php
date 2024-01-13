<?php

    class Packages{
        public static function getAll(){
            $locker = Customers::getSession();
            $packages = query("SELECT
                    p.id,
                    CONCAT('assets/img/courier/', LOWER(cc.name), '.png') as carrier_logo,
                    p.tracking,
                    p.photo,
                    CONCAT(p.pound, ' lb') as pound,
                    ps.name as status,
                    ps.color as status_color,
                    i.total                  
                from
                    packages p
                inner join packaging_status ps on
                    ps.id = p.status
                inner join customers c on
                 p.customer_locker = c.locker
                inner join courier_companies cc on
                    cc.id = p.id_carrier
                inner join invoices i on
                    i.id_package = p.id
                where c.locker = '$locker->locker' and p.type = 'PKG'
                ORDER BY id DESC
                    
            ",'ALL');
            foreach($packages as $key => $package){
                $package->photo =  (empty($package->photo)) ? '' : 'img/packages/' . $package->id;
            }
            
            return $packages;
        }
        public static function getPhoto($id){
            $photo = query("SELECT photo as file, photo_type as type FROM packages WHERE id = '$id';");
            
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