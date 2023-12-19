<?php

    class Packages{
        public static function getAll(){
            $locker = Customers::getSession();
            $packages = query("SELECT
                    p.id,
                    CONCAT('assets/img/courier/', LOWER(cc.name), '.png') as carrier_logo,
                    p.tracking,
                    CONCAT(p.pound, ' lb') as pound,
                    ps.name as status,
                    ps.color as status_color,
                    i.total,
                    pp.file as url_img
                    
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
                left join packages_photos pp on pp.id_packages = p.id
                where c.locker = '$locker->locker'
                ORDER BY id DESC
                    
            ",'ALL');
            foreach($packages as $key => $package){
                $package->url_img =  (empty($package->url_img)) ? '' : 'img/packages/' . $package->id;
            }
            
            return $packages;
        }
        public static function getPhoto($id){
            $photo = query("SELECT file, type FROM packages_photos WHERE id_packages = '$id';");
            
            return $photo;

        }
        public static function gettPackagingTypeSelect(){
            $packaging_type = query("SELECT id, name AS text FROM packaging_type", 'ALL');

            return $packaging_type;
        }
        public static function getCategorySelect(){
            $packaging_categories = query("SELECT id, name AS text FROM packaging_category", 'ALL');
        
            return $packaging_categories;
        }
    }