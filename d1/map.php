<?php

$maps=array();
array_push($maps, "abc","def");
$maps['abc']=1;
$maps['def']=2;

print_r($maps);// array is both (int based index + associative(maps)) depending how accessed




$emptyArray=array();
// Push elements to the array
array_push($emptyArray, "geeks", "for", "geeks");
print_r($emptyArray);

//array ops:count, access first &last elements
$odd_numbers = [1,3,5,7,9];
unset($odd_numbers[2]); // will remove the 3rd item (5) from the list
echo count($odd_numbers);//will print len of array
$first_item = reset($odd_numbers);//reset function gets the first member of the array. (It also resets the internal iteration pointer).
$last_item = end($odd_numbers);//gets the last item of array
$last_index = count($odd_numbers) - 1;//get n-1 index
$last_item = $odd_numbers[$last_index];//use index to access variable
print_r($odd_numbers);


//stack ops
$numbers = [1,2,3];
array_push($numbers, 4); // now array is [1,2,3,4];
array_pop($numbers); // now array is [1,2,3];
array_unshift($numbers, 0); // now array is [0,1,2,3];adds element to front
array_shift($numbers); // now array is [1,2,3];pop from beginning

//array concatentaion
$odd_numbers = [1,3,5,7,9];
$even_numbers = [2,4,6,8,10];
$all_numbers = array_merge($odd_numbers, $even_numbers);
sort($all_numbers);
print_r($all_numbers);


