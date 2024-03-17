<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    class Email{

        private static function sendOut($address, $subject, $name, $body, $attached = []){
            $mail = new PHPMailer(true);

            try {
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->Host       = smtp_host;
                $mail->SMTPAuth   = true;
                $mail->Username   = smtp_email;
                $mail->Password   = smtp_password;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = smtp_port;
                $mail->CharSet = 'UTF-8';
                $mail->addReplyTo(smtp_reply, COMPANY);
                
                $mail->setFrom(smtp_from, COMPANY);
                if(is_object($address)){
                    
                    foreach($address as $a){
                       $mail->addBCC($a);
                    }
                }else{
                    $mail->addAddress($address, $name);
                }
                
                $mail->addReplyTo(smtp_email, COMPANY);
                foreach($attached as $key => $file){
                    $mail->addAttachment($attached[$key]);
                }
                //Content
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body    = $body;

                $mail->send();
            }catch (Exception $e) {

            }
        }
        private static function dataFormart($data){
            $d = array();
            $data->COMPANY_NAME = COMPANY;
            $data->WEBSITE_NAME = WEBSITE;
            $data->chronym_locker = chronym_locker;
            foreach ($data as $key => $val) {
                if($key != 'body' and $key != 'action' and gettype($val) != 'array'){
                    $d['[' .  strtoupper($key) . ']'] = $val;
                }
                
            }
            return $d;
        }
        private static function setValueTemple($body, $data){

            foreach ($data as $key => $val) {
                $body = str_replace($key, $val, $body);
            }
            return $body;
        }
        private static function getTemplate($id){
            $dir = DIR_TEMPLANTE;
            $templante_email = query("SELECT id, subject, CONCAT('$dir', '/email/', file)file FROM templante_email WHERE id = '$id'");

            $templante_email->body = file_get_contents($templante_email->file);
            return $templante_email;
        }

        public static function send($data){
            $str = self::dataFormart($data->data);
            $templante = self::getTemplate($data->id_templente);
            $body = self::setValueTemple($templante->body, $str);
            
            self::sendOut($data->address, $templante->subject, $data->name, $body);
        }

    }
