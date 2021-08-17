<?php

    $a=1;
    $b=2;
    //for normie max
    for ($i=0;$i<8;$i++){// variables declared as part of loop ; are functional scoped in which the loop encapsulated.
        print ("iter num= $i,iter val=$a\n");
    }

    print"begins while loop \n\n";

    //while
    while ($i>0){

        print("iter num= $i,iter val=$a\n");
        $i=$i-1;
    }

    //foreach
    print"begins foreach loop \n\n";
    $array = array( 1, 2, 3, 4, 5);

    foreach( $array as $value ) {
        echo "Value is $value \n";
    }

    $i=1;
    while( $i < 10) {
        $i++;
        if( $i==3)break;
    }
    echo ("Loop stopped at i = $i" );



    foreach( $array as $value ) {
        if( $value == 3 )continue;
        echo "Value is $value \n";
    }


