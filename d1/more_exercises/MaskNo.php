<?php

function masker($number){

    $length=strlen($number);
    if($length!=10){
        return "Not Valid Phone Number";
    }

    for($iterator=0;$iterator<strlen($number);$iterator++){
       if($iterator<=1 || $iterator>=($length-2)){continue;}
       $number[$iterator]="*";

    }
    return $number;

}

$number="9876543210";
echo masker($number);