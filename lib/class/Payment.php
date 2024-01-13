<?php

    class Payment{
        public static function metodAllSelect(){
            $method = query("SELECT
                    id,
                    name as text,
                    concat('assets/img/', logo) as logo,
                    icon,
                    style
                FROM payment_method
                where customer_pay = 1;
            ", 'ALL');
            
            return $method;
        }
        public static function genUrl($id_invoice, $locker, $invoice_token):object{
            $result = (object)[];
            $token = sha1(date('Y-m-d H:i:s') . $id_invoice . $locker);
            self::setHash(2, $token, $invoice_token);
            $result->url = URL_CUSTOMER_SYSTEM . 'payment/' . $token;
            return $result;
        }
        public static function checketHash($hash){
            $result = query("SELECT * FROM payment_hash WHERE token = '$hash' and status = 1");
            
            $val  = ($result) ? $result : false;
            return $val;
        }
        public static function setHash($id_method, $token, $invoice_token){
            $date_create = date('Y-m-d H:i:s');
            query("INSERT INTO payment_hash(
                date_create, id_method, token, invoice_token
                )value (
                '$date_create', '$id_method', '$token', '$invoice_token')"
            ,);
        }
        public static function disableToken($token){
            query("UPDATE payment_hash SET status = '0' WHERE token = '$token';");
        }
        public static function getInvoiceHash($token){
            $result = query("SELECT
                    i.id,
                    i.total,
                    ph.id_method,
                    i.balance
                FROM invoices i
                INNER JOIN packages p on p.id = i.id_package
                INNER JOIN customers c ON c.locker = p.customer_locker
                INNER JOIN payment_hash ph on ph.invoice_token = sha2(concat(c.locker, i.id), 256)
                WHERE ph.token = '$token' and ph.status = 1;");
            
            return $result;
        }
        public static function addPayment($data){
            $db = conexion("INSERT INTO payment(
                    id_invoice,
                    amount_paid,
                    balance,
                    id_method,
                    num_reference,
                    id_type,
                    date_created,
                    status,
                    voucher,
                    voucher_size,
                    voucher_type
                ) VALUES (
                    :id_invoice,
                    :amount_paid,
                    :balance,
                    :id_method,
                    :num_reference,
                    :id_type,
                    :date_created,
                    :status,
                    :voucher,
                    :voucher_size,
                    :voucher_type
                )
            ");

            $db->bindParam(':id_invoice', $data->id_invoice);
            $db->bindParam(':amount_paid', $data->amount_paid);
            $db->bindParam(':balance', $data->balance);
            $db->bindParam(':id_method', $data->id_method);
            $db->bindParam(':num_reference', $data->num_reference);
            $db->bindParam(':id_type', $data->id_type);
            $db->bindParam(':date_created', $data->date_created);
            $db->bindParam(':status', $data->status);
            $db->bindParam(':voucher', $data->voucher); // Corregido aquí
            $db->bindParam(':voucher_size', $data->voucher_size); // Corregido aquí
            $db->bindParam(':voucher_type', $data->voucher_type); // Corregido aquí


            $db->execute();
            JSON(['success' => true]);
        }
        
    }