<?php

    class Oficces{
        public static function allSelect(){
            $offices = query("SELECT name as text, id from offices as o",'all');

            return $offices;
        }
    }