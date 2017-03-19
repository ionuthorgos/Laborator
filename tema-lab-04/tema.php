<?php

$a = 5;
$b = false;
$c = true;
$d = 10;
if ( $a > 10){
    
    echo "A mai mare decat 10";
    
} elseif ( $a > 0 && $a <= 10) {
    //
    echo "A este in intervalul 0-10";
    
} else{
    
    echo "A este mai mic decat 0";
}

echo "<br />";

//a doua cerinta: se verifica  daca b si c sunt adevarate - "afiseaza b si c TRUE", altfel daca a sau b sunt adevarate - "afiseaza ab sau c sunt TRUE", atfel "b si c sunt FALSE"


if ( $b == true && $c == true ){
    
    echo "b si c True";
    
} else if ( $a == true && $b == true){
    
    echo "ab sau c sunt TRUE";
    
} else{
    
    echo " ba si c sunt False";
    
}

//a treia cerinta: Se construieste o instructiune switch pentru a verifica daca $d este 1,2,3,4 sau 5 si se afiseaza numarul. In caz contrar se afiseaza mesajul "nu este 1,2,3,4 sau 5"

echo "<br />";

switch ($d){
        
    case 1 :
        echo "d este 1";
        break;
    case 2 :
        echo "d este 2";
        break;
    case 3 : 
        echo "d este 3";
        break;
    case 4 : 
        echo "d este 4";
        break;
    case 5 :
        echo "d este 5";
    default : 
        echo "d nu este 1,2,3,4 sau 5";
        break;
}


























