<?php
//ปฏิพัฒน์ สุวรรณกมลาศ 6620610009
include "conndb.php";

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS bank";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

//select database
if($conn -> select_db($dbname)){
        echo "Darabase".$dbname."selected successfully!<br>";
    }
    else{
        echo "Error selecting database:".$conn ->error;
    }

// Create table account
$sql_a = "CREATE TABLE IF NOT EXISTS account (
    account_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    account_number VARCHAR(10) NOT NULL,
    deposit INT(30) NOT NULL,
    date VARCHAR(30) NOT NULL ,
    net_amount INT(30) NOT NULL
    )";

$sql_d = "CREATE TABLE IF NOT EXISTS deposit (
    deposit_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    account_id INT(6) UNSIGNED,
    account_number VARCHAR(10) NOT NULL,
    deposit_amount INT(30) NOT NULL,
    date VARCHAR(30) NOT NULL,
    result INT(30) NOT NULL,
    FOREIGN KEY (account_id) REFERENCES account(account_id) ON DELETE CASCADE
    )";

$sql_w = "CREATE TABLE IF NOT EXISTS withdraw (
    withdraw_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    account_id INT(6) UNSIGNED,
    account_number VARCHAR(10) NOT NULL,
    withdraw_amount INT(30) NOT NULL,
    date VARCHAR(30) NOT NULL,
    result INT(30) NOT NULL,
    FOREIGN KEY (account_id) REFERENCES account(account_id) ON DELETE CASCADE
    )";

if ($conn->query($sql_a) === TRUE) {
  echo "Table account created successfully<br>";
} 
else {
  echo "Error creating table: " . $conn->error;
}

if ($conn->query($sql_d) === TRUE) {
  echo "Table deposit created successfully<br>";
} 
else {
    echo "Error creating table: " . $conn->error;
}
if ($conn->query($sql_w) === TRUE) {
    echo "Table withdraw created successfully<br>";
    }
else {
      echo "Error creating table: " . $conn->error;
    }
    header("Location: h.php");
?>

