<?php

    class Theme{
        public static function header($arr = []){
            $header = '<!DOCTYPE html>
            <html lang="es" class="js">
            
            <head>
                '.self::base($arr).'
                <meta charset="utf-8">
                <meta name="author" content="">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta name="description" content="">
                <!-- Fav Icon  -->
                <link rel="shortcut icon" href="assets/img/favicon.png">
                <!-- Page Title  -->
                '.self::title($arr).'
                <!-- StyleSheets  -->
                '.self::css($arr).'
                '.self::external_js($arr) .'
            </head>
            
            <body class="nk-body bg-lighter npc-default has-sidebar '. self::dartMode() .' ">
                '.self::loader().'
                <div class="nk-app-root">';
            echo $header;
        }
        private static function title($arr){
            $title = (isset($arr['title']) and !empty($arr['title'])) ? '<title>'.COMPANY.' | '.$arr['title'].' </title>' : '<title>'.COMPANY.'</title>';
            return $title;
        }

        public static function footer($arr = []){
            $footer = self::JS($arr) .
                        self::pluginJS($arr) .
                        self::dataJS($arr) .
                '</body>
            </html>';

            echo $footer;
        }
        private static function pluginJS($arr){
            $js = '';
            if(isset($arr['plugins'])){
                foreach($arr['plugins'] as $key => $value){
                    $js .= '<script type="text/javascript" src="assets/plugins/' .$key . '/' .$value . '.js?ver='.VERSION.'"></script>';
                }
            }
            return $js;
        }
        private static function external_js($arr){
            $js = '';
            if(isset($arr['externalJS']) and is_array($arr['externalJS'])){
                foreach($arr['externalJS'] as $val){
                    $js .= '<script  src="'.$val[0].'"></script>';
                }
            }
            return $js;
        }
        private static function JS($arr){
            $js = '';
            if(isset($arr['js']) or isset($arr['JS']) and is_array($arr['js'])){
                foreach($arr['js'] as $val){
                    $js .= '<script type="text/javascript" src="assets/js/' .$val . '.js?ver='.VERSION.'"></script>';
                }
            }
            return $js;
        }
        private static function dataJS($arr){
            if(isset($arr['dataJS'])){
                $js = '';
                foreach($arr['dataJS'] as $val){
                    $js .= '<script type="module" src="lib/dataJS/' .$val . '.js?ver='.VERSION.'"></script>';
                }
                return $js;
            }
        }
        private static function base($arr){
            if(isset($arr['base'])){
                return '<base href="' . $arr['base'] . '">';
            }
        }
        private static function css($arr){
            $css = '';
            if(isset($arr['css'])){
                foreach($arr['css'] as $val){
                    $css .= '<link rel="stylesheet" id="'.$val.'" type="text/css" href="assets/css/' . $val . '.css?ver='.VERSION.'" >';
                }
            }

            return $css;
        }
        private static function loader(){
            $loader = ' <div  class="loader" id="loader">
                            <div class="d-flex justify-content-center h-100">
                                <div class="align-self-center ">
                                    <div class="spinner-grow" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>';

            return $loader;
        }

        public static function sidebar(){
            $sidebar = query("SELECT * FROM sidebar WHERE type = 'item' and system = 'customers' and status = 1 ORDER by orden", 'ALL');
            
            return $sidebar;
        }
        public static function sidebar_sub($id){
            $sidebar = query("SELECT * FROM sidebar WHERE type = 'sub' AND parent = '$id'", 'ALL');
            
            return $sidebar;
        }
        private static function dartMode(){
            if(isset($_COOKIE['YLCBoxesDarkMode']) and $_COOKIE['YLCBoxesDarkMode'] == 'true'){
                return 'dark-mode';
            }
        }
        
    }