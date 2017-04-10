<?php

 $text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi varius libero non metus egestas maximus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin diam turpis, bibendum ut metus non, tincidunt maximus metus. Maecenas quis rutrum mi. Pellentesque lacinia tempor ultricies. In hac habitasse platea dictumst.";
	 

$cautam = count(explode(".",$text))-1;
$virgule = count(explode(",",$text))-1;

echo "exista $cautam propozitii"."<br />";
echo "exista $virgule virgule si $cautam puncte in total ";
echo $virgule + $cautam." semne de punctuatie"."<br/>";

$a = explode(" ",$text);
$i = 0;

foreach($a as $value){
	if(strpos($value,"a") >= -1){
		$i++;
	}
}

echo " $i cuvinte care contin litera a";