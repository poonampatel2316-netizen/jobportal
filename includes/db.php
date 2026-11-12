<?php
$connect=mysqli_connect(
    "localhost",
    "root",
    "",
    "job_portal"
);
if(!$connect){
    die("connection fail".mysqli_connect_error());
 }else{
    // echo"connection successfull !";
}


?>