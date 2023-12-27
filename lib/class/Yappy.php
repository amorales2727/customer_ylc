<?php

    require 'Yappy/src/BgFirma.php';
    class Yappi extends BgFirma{
        
        private static $merchantId  = 'c671352d-b8ba-40f7-9caa-123de75a7d45';
        private static $secretKey   = 'WVBfRTAwOUYwNzItMzBCMi0zRDg3LTgyMjktMzJGNDQ0Njk3RjVCLmM2NzEzNTJkLWI4YmEtNDBmNy05Y2FhLTEyM2RlNzVhN2Q0NQ==';
        private static $url_success = 'https://customers.ylcboxespanama.com/';
        private static $url_fail    = 'https://customers.ylcboxespanama.com/';
        private static $domain      = 'https://customers.ylcboxespanama.com/';

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
                    "VEN",
                    $data->id_invoice,
                    self::$url_success,
                    self::$url_fail,
                    self::$domain,
                    self::$secretKey,
                    true,
                    $checkCredentials["accessToken"],
                    ''
                );
                $Yappy = $bg->createHash();
                Payment::setHash(3, $Yappy->hash, $data->token_invoice);
                return $Yappy;
            }
        }
        public static function setPayment($data){
            $data->date_created =  date('Y-m-d H:i:s');
            $data->status = 3;

            query("INSERT INTO payment(
                id_invoice, amount_paid, balance, id_method, num_reference, id_type, date_created, status
                    ) VALUES (
                '$data->id_invoice','$data->amount_paid', '$data->balance','$data->id_method', '$data->num_reference', '$data->id_type', '$data->date_created', '$data->status')");
        }
        public static function validateHash(){
            try {
                include 'env.php'; // IMPORTAR ARCHIVO DE ENV PARA UTILIZAR LA VARIABLE 'CLAVE_SECRETA'
                $orderId = $_GET['orderId'];
                $status = $_GET['status'];
                $hash = $_GET['hash'];
                $domain = $_GET['domain'];
                $values = base64_decode(self::$secretKey);
                $secrete = explode('.', $values);
                $signature =  hash_hmac('sha256', $orderId . $status . $domain, $secrete[0]);
                $success = strcmp($hash, $signature) === 0;
            } catch (\Throwable $th) {
                $success = false;
            }
            return $success;
        }
    }
    