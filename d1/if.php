<?php

    $d = date("D");//gets textual representation of day three letters: today tues

    if ($d == "Tue") {
        echo "Have a nice week!\n";
    }
    elseif ($d)
    {
        print"here\n";
        echo "Have a nice Sunday!\n";
    }
    else
    {
        echo "Have a nice day!\n";
    }

    switch ($d){
        case "ABS":
            echo "it be abs\n";
            break;
        default:
            echo "didnt find anything\n";


}

switch ($d){
    case "Mon":
        echo "Today is Monday";
        break;

    case "Tue":
        echo "Today is Tuesday";
        break;

    case "Wed":
        echo "Today is Wednesday";
        break;

    case "Thu":
        echo "Today is Thursday";
        break;

    case "Fri":
        echo "Today is Friday";
        break;

    case "Sat":
        echo "Today is Saturday";
        break;

    case "Sun":
        echo "Today is Sunday";
        break;

    default:
        echo "Wonder which day is this ?";
}