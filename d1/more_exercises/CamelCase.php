<?php

function ConvertToCamelCase($arrayString){

    if (!is_array($arrayString)){
        echo "Input needed is an array !";
    }

    for($iter=0;$iter<count($arrayString);$iter++){
        $currentString=$arrayString[$iter];
        $stackStrings=array();
        $stackStrings=explode("_",$currentString);
        $appendString=strtolower($stackStrings[0]);
        for($iteration=1;$iteration<count($stackStrings);$iteration++)
        {
            $appendString=$appendString.ucwords(strtolower($stackStrings[$iteration]));
        }
        $arrayString[$iter]=$appendString;

    }
    print_r( $arrayString);


}

ConvertToCamelCase(["camel_Case","tokyo_japan","hello_WOrld"]);