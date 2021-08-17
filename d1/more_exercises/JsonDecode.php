<?php

$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';
$convert = "{\"players\":[{\"name\":\"Ganguly\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Dravid\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Dhoni\",\"age\":37,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Virat\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}}]}";
$obj = json_decode($convert);

print_r($obj->{'players'}[0]->name);
print_r($obj->{'players'}[0]->address->city);

$PlayerNames=array();
for ($iteration=0;$iteration<count($obj->{'players'});$iteration++ )
{
    array_push($PlayerNames,$obj->{'players'}[$iteration]->name);
}

$PlayerAges=array();
for ($iteration=0;$iteration<count($obj->{'players'});$iteration++ )
{
    array_push($PlayerAges,$obj->{'players'}[$iteration]->age);
}

$PlayerCities=array();
for ($iteration=0;$iteration<count($obj->{'players'});$iteration++ )
{
    array_push($PlayerCities,$obj->{'players'}[$iteration]->address->city);
}
print_r($PlayerNames);
print_r($PlayerAges);
print_r($PlayerCities);

$UniqueNames=array_unique($PlayerNames);
print_r($UniqueNames);

$maxAge=0;
for ($iteration=0;$iteration<count($obj->{'players'});$iteration++ )
{
   $maxAge=max($maxAge,$obj->{'players'}[$iteration]->age);
}
$AgedPlayers=array();
for ($iteration=0;$iteration<count($obj->{'players'});$iteration++ )
{
    if($obj->{'players'}[$iteration]->age==$maxAge){
      array_push($AgedPlayers,$obj->{'players'}[$iteration]->name);
    }
}
print_r($AgedPlayers);
