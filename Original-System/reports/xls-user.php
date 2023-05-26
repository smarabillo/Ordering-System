<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=".date("Y-m-d")."-user-report.xls");

include_once '../classes/user-class.php';
include '../config/config.php';

$user = new User();
$UserId_Login = $user->get_userid($_SESSION['UserId']);
$UserAccess = $user->get_access($UserId_Login);

echo 'Id' . "\t" . 'Full Name' . "\t" . 'Address' . "\t" . 'Contact Number' . "\t" . 'Access' . "\n";

$count = 1;
if($user->list_users() != false){
    foreach($user->list_users() as $value){
        extract($value);
  
            echo $UserId . "\t" . $FullName. "\t " .$UserAddress . "\t" . $ContactNum . "\t" . $UserAccess . "\n";
            
                $count++;
    }
}