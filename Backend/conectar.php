<?php
    $host = 'db4free.net:3306'; 
    $dbuser = 'condor';
    $dbpassword = 'betaalfa800';
    $dbname = 'parqueo';

    $conn = mysqli_connect($host,$dbuser,$dbpassword,$dbname);
    if($conn){
        mysqli_query($conn,'SET NAMES uff8');
        
    }
    else {
        
    }
?>