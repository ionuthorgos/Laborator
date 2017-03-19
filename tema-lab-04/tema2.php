<?php

$a = 2;
$b = 10;
$i = 2;
$c = 10;
for ($i; $i <=10; $i++){
    //preincrementare
    echo "$i ";
}
echo "<br />";

for ($b; $b >= 2; $b--){
    //predecrementare
    echo "$b ";
}
echo "<br />";

for ($a; $a <= 10; ++$a){
    //postincrementare
    echo "$a ";
}
echo "<br />";

for ($c; $c >= 2; --$c){
    //postdecrementare
    echo "$c ";
}