<?php
function inc($file, $ruta = '', $extencion = '.php')
{
    $dir = 'inc/' . $ruta . $file . $extencion;
    require $dir;
}
function JSON($arr, $status = 200, $die = true)
{
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    print json_encode($arr);

    if ($die == true) {
        die();
    }
}
function OBJ($arr)
{

    $obj = new ArrayObject($arr);
    $obj->setFlags(ArrayObject::ARRAY_AS_PROPS);

    return $obj;
}

function showSelected($valor1, $valor2)
{
    if ($valor1 == $valor2) {
        echo 'selected';
    }
}
function showClass($valor1, $valor2, $class)
{
    if ($valor1 == $valor2) {
        echo $class;
    }
}
function showArgument($valor1, $valor2, $class)
{
    if ($valor1 == $valor2) {
        echo $class;
    }
}
function genPassword()
{
    $longitud = password_length;

    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
    $caracteres_longitud = strlen($caracteres);
    $contrasena_aleatoria = '';

    for ($i = 0; $i < $longitud; $i++) {
        $indice_aleatorio = random_int(0, $caracteres_longitud - 1);
        $contrasena_aleatoria .= $caracteres[$indice_aleatorio];
    }
}
function showDateTime($dateTime){
    $dateTime = date('d-m-Y h:i A');

    return $dateTime;
}
function setCurrency($value){
    $characters = ['$', ' ', ','];

    $value = str_replace($characters, '', $value);

    return $value;
}
function showCurrency($value){
    $numero_formateado = '$' .number_format($value, 2, '.', ',');

    return $numero_formateado;
}
function floadAmont($str){
    $str = str_replace(['$', ' '], '', $str);
    $str = floatval($str);
    $str = number_format($str, 2, '.', '');
    $str = floatval($str);
    return $str;
}

function uploadTMP($tmp, $filename){
    $dir = dir . 'tmp/' . $filename;
    move_uploaded_file($tmp, $dir);

    return $dir;
}
function setDate($date){
    $date = explode('/', $date);

    $date = $date[2] . '-' . $date[1] . '-' . $date[0];

    return $date;
}