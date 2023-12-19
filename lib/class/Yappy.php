<?php

    require 'Yappy/src/BgFirma.php';
    class Yappi extends BgFirma{
        
        private static $merchantId  = 'c671352d-b8ba-40f7-9caa-123de75a7d45';
        private static $secretKey   = 'WVBfRTAwOUYwNzItMzBCMi0zRDg3LTgyMjktMzJGNDQ0Njk3RjVCLmM2NzEzNTJkLWI4YmEtNDBmNy05Y2FhLTEyM2RlNzVhN2Q0NQ==';
        private static $url_success = '';
        private static $url_fail    = '';
        private static $domain        = 'https://ylcboxespanama.com/';
        public static function  sendPayment($data){
            $checkCredentials = self::checkCredentials(self::$merchantId, self:: $secretKey, self::$domain );
            if($checkCredentials['success'] = true){
                $bg = new BgFirma(
                    $data->total,
                    self::$merchantId,
                    $data->subtotal,
                    $data->taxes,
                    $checkCredentials['unixTimestamp'],
                    "YAP",
                    "PAG",
                    $data->token_invoice,
                    self::$url_success,
                    self::$url_fail,
                    self::$domain,
                    self::$secretKey,
                    true,
                    $checkCredentials["accessToken"],
                    '6000-0000'
                );
                $response = $bg->createHash();
                JSON($response);
            }
        }
    }
    