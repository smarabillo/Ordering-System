<?php
include 'classes/class.user.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
	case 'new':
        create_user();
	break;
}
function create_user(){
	$user = new User();
    $UserId = $_POST['UserId'];
    $UserPass = $_POST['UserPass'];
    $FullName = ucwords($_POST['FullName']);
    $UserAddress= ucwords($_POST['UserAddress']);
    $ContactNum = ($_POST['ContactNum']);
    $UserAccess = ucwords($_POST['UserAccess']);
    
    $result = $user->new_user($UserId,$UserPass,$FullName,$UserAddress,$ContactNum,$UserAccess);
    if($result){
        $id = $user->get_user($FullName);
        header('location: index.php?page=usersettings&subpage=userlist');
    }
}

// function update_user(){
// 	$user = new User();
//     $UserId = $_POST['UserId'];
//     $UserPass = $_POST['UserPass'];
//     $FullName = ucwords($_POST['FullName']);
//     $UserAddress= ucwords($_POST['UserAddress']);
//     $ContactNum = ($_POST['ContactNum']);
//     $UserAccess = ucwords($_POST['UserAccess']);
   
//     $result = $user->update_user($FullName,$UserPass,$UserAddress);
//     if($result){
//         header('location: '.$UserId);
//     }
// }

