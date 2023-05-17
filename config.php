<?php

$HOSTNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = '';
$DATABaSE = 'signupforms';

 $conn = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABaSE);

if($conn){
    echo "connection secure!!";
}else{
    die(mysqli_error($conn));
}


?>