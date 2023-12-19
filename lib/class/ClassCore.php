<?php


    class Core{
        public static function getConfigAll(){
            $config = query("SELECT * FROM config", 'ALL');

            $data = array();

            foreach($config AS $val){
                $data[$val->config_name] = $val->config_value;
            }
            return $data;
        }
        public static function getAddress():object{
            $address = (OBJECT) [
                'provincias' => self::getProvincias(),
                'distritos' => self::getDistrito(),
                'corregimeintos' => self::getCorregimiento()
            ];

            return $address;
        }
        private static function getProvincias(){
            $provincias = query("SELECT id, name as text FROM provincia", 'ALL');

            return $provincias;
        }
        private static function getDistrito(){
            $provincias = query("SELECT id,  name as  text, id_provincia FROM distrito", 'ALL');

            return $provincias;
        }
        private static function getCorregimiento(){
            $provincias = query("SELECT id,  name as text, id_provincia, id_distrito FROM corregimiento", 'ALL');

            return $provincias;
        }
    }