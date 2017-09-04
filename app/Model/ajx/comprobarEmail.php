<?php

require_once  '../../../app/config.php';
require_once  '../../../app/Model.php';

$mail = $_GET['email'];

$m = Propietario::buscarEmail($mail);

if($m){
    echo $m['email'];
}
else{
    echo "Por $mail No me viene nada";
}