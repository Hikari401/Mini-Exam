<?php
    include "conndb.php";    
    $dbname = "bank";
    if($conn -> select_db($dbname)){
        echo "Darabase".$dbname."selected successfully!<br>";
    }
    else{
        echo "Error selecting database:".$conn ->error;
    }
   
        $username = $_POST['username'];
        $password = $_POST['password'];
        $account_number = $_POST['account_number'];
        $deposit = $_POST['deposit'];
        $date = $_POST['date'];
        $net_amount = $_POST['deposit'];

    
    $stmt = $conn -> prepare("insert into account(username,password,account_number,deposit,date,net_amount) values(?,?,?,?,?,?)");
    $stmt ->bind_param("sssisi",$username,$password,$account_number,$deposit,$date,$net_amount);
    $execval = $stmt -> execute();
    echo $execval;

    header('Location: opne.php');
    exit();