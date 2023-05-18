<?php

$HOSTNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = '';
$DATABaSE = 'signupforms';

 $conn = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABaSE);

if(!$conn){
 die(mysqli_error($conn));
}


?>