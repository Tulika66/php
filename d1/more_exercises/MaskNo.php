<?php

function masker($number,$maskFrom){
    $length=strlen($number);
    if($length!=10){
        return "Not Valid Phone Number";
    }


    //maskFrom=2 ;=> first two letters mask out and last two
    if($maskFrom>=5 || $maskFrom==0){
        return $number;
    }
    if($maskFrom<0){
        return "Enter valid masking length";
    }

    for($iterator=0;$iterator<strlen($number);$iterator++){
       if($iterator<=($maskFrom-1) || $iterator>=($length-$maskFrom)){continue;}
       $number[$iterator]="*";

    }
    return $number;

}

$number="9876543210";
echo masker($number,5);