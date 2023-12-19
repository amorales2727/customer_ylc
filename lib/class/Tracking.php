<?php

    class Tracking{
        const URL = 'https://api.17track.net/track/v2/';
        public static function add($data){
            self::exists($data);
            $apiToken = self::getApiToken();
            $datos = [
                [
                    "number" => $data->tracking,
                    "lang" => "es"
                ]
            ];
            $result = self::curl('register', $apiToken, $datos);
            if(empty($result->data->rejected)){
                $result->data->accepted[0]->token    = $result->data->token;
                self::setTracking($result->data->accepted[0]);
            }else{
                JSON([
                    'error' => true,
                    'error_tracking' => true, 
                    'msg'   => 'Validar nuemero de tracking',
                    $result],
                    400);
            }
        }
        private static function exists($data){
            $result = query("SELECT * FROM tracking WHERE number = '$data->tracking'");
            if($result){
                JSON(['error' => true], 400);
            }
        }
        private static function setTracking($data){
            query("INSERT INTO tracking(
                    number,
                    carrier,
                    token
                ) VALUES (
                    '$data->number',
                    '$data->carrier',
                    '$data->token'
            )");
        }
        private static function curl($endPoint, $apiToken, $fild = []){
            $headers = [
                "17token: $apiToken",
                'Content-Type: application/json',
            ];
            $data = json_encode($fild);
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, self::URL . $endPoint);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            $response = curl_exec($curl);
            $datos = json_decode($response, false);
            $datos->data->token = $apiToken;

            return $datos;
        }
        private static function getApiToken(){
            $apiToken = '';
            $allToken = query("SELECT * FROM token17track WHERE status = 1", 'ALL');

            if(count($allToken) > 0){

                foreach($allToken as $token){
                    $response = self::curl('getquota', $token->token);
                    if($response->data->quota_used < $response->data->quota_total){
                        $apiToken = $token->token;
                        break;
                    }else{
                        self::setStatusToken($token->token, 0);
                    }
                }
            }else{
                die();
            }

            return $apiToken;
        }
        private static function setStatusToken($token, $value){
            query("UPDATE token17track SET status = '$value' WHERE token = '$token'");
        }

        public static function getInfo($data){
            $result = query("SELECT
                    t.number,
                    t.carrier,
                    t.token,
                    concat('assets/img/courier/', lower(cc.name), '.png') as logo_carrier
                FROM tracking t
                inner join courier_companies cc
                WHERE number = '$data->tracking'");
            if($result){
                $info = self::curl('gettrackinfo', $result->token, [
                    [
                        "number"  => $result->number,
                        "carrier" => $result->carrier
                    ]
                ]);
                if(empty($info->data->errors)){
                    $info->logo_carrier = $result->logo_carrier;
                    $datos = self::showInfo($info);
                    JSON($datos);
                }else{
                    JSON(['error' => true, $info], 400);
                }
            }else{
                JSON(['error' => true], 400);
            }
            
            
        }
        public static function showInfo($data){
            $info = (object) array();
            $info->tracking = $data->data->accepted[0]->number;
            $info->logo_carrier = $data->logo_carrier;
            $info->status = $data->data->accepted[0]->track_info->latest_status->status;
            $info->time   = $data->data->accepted[0]->track_info->latest_event->time_utc;
            $info->time   = date_format(date_create($info->time), 'd/m/Y h:i A');
            $info->events = array();
            $events  = $data->data->accepted[0]->track_info->tracking->providers[0]->events;

            foreach($events as $event){
                array_push($info->events, (object) array(
                    'time'        => date_format(date_create($event->time_utc), 'd/m/Y h:i A'),
                    'location'    => $event->location,
                    'stage'       => $event->stage,
                    'description' => $event->description,
                ));
            }

            JSON($info);
        }
    }