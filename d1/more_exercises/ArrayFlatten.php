<?php

function flatten_layer($numbers){
    if(!is_array($numbers) ){
        return $numbers;
    }
    $ans=array();
    $arrayStack=array_values($numbers);
    while($arrayStack){
        $top=array_shift($arrayStack);
        if(is_array($top)){
            array_unshift($arrayStack, ...$top);
        }else{
            array_push($ans,$top);
        }
    }
    return $ans;

}

$numbers=array(1,2,3,[4,[5,8,9]],[6,7]);
$numbers=flatten_layer($numbers);
print_r($numbers);


