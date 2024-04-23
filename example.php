<?php 
$lastCustomerID = "ADM002";
$prefix = substr($lastCustomerID, 0, 3); 
$number = substr($lastCustomerID, 3);
echo $number. ' ' .$prefix;
$number = (int)$number + 1;
echo $number;
$number = "00" . $number;
$newID = $prefix . $number;
echo $newID;
?>