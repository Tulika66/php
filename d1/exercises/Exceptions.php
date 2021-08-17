<?php

   //exception 1
    try {
        echo 2 / 0;
    } catch (Exception $e) {
        echo "Caught exception: Division by zero!";
    }

    //exception 2
    try {
        echo 4/0;
    } catch (Exception $e) {
        echo "Divided by zero!";
    } finally {
        echo "This will be outputed even if exception will happen!";
    }


# This function will throw an exception!
    function throw_exception()
    {
        throw new Exception("Exception!");
    }

# Surround the statement in a try-catch-finally block!
    try {
        throw_exception();
    } catch (Exception $e) {
        echo "Exception caught!\n";
    } finally {
        echo "Done!";
    }
