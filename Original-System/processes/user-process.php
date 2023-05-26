<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../classes/user-class.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
	case 'new':
        create_user();
	break;
    case 'update':
        update_user();
    break;
    case 'delete':
        delete_user();
    break;
    case 'change':
        change_pass();
    break;
}
function create_user(){
	$user = new User();
    $UserPass = $_POST['UserPass'];
    $FullName = ucwords($_POST['FullName']);
    $UserAddress= ucwords($_POST['UserAddress']);
    $ContactNum = ($_POST['ContactNum']);
    $UserAccess = ($_POST['UserAccess']);
    $UserPass = md5($UserPass);
    
    $result = $user->new_user($UserPass,$FullName,$UserAddress,$ContactNum,$UserAccess);
    if($result){
        header('location: ../index.php?page=users&subpage=userlist');
    }
}

function update_user(){
	$user = new User();
    $UserId = $_POST['UserId'];
    $FullName = ucwords($_POST['FullName']);
    $UserAddress= ucwords($_POST['UserAddress']);
    $ContactNum = $_POST['ContactNum'];
    $UserAccess = $_POST['UserAccess'];
   
    $result = $user->update_user($UserId, $FullName, $UserAddress, $ContactNum, $UserAccess);
    if($result){
        header('location: ../index.php?page=users&subpage=userlist&id='.$UserId);
    }
}

function delete_user(){
    if (isset($_POST['UserId']) && is_numeric($_POST['UserId'])) {
        $user = new User();
        $UserId = $_POST['UserId'];
        $result = $user->delete_user($UserId);
        if ($result) {
            header('location: ../index.php?page=users&subpage=userlist&id='.$UserId);
        } 
    }
}

function change_pass(){
	$user = new User();
    $id = $_POST['UserId'];
    $current_password = $_POST['currentpass'];
    $new_password = md5($_POST['newpass']);
    $confirm_password = $_POST['confirmpass'];
    $result = $user->change_password($id,$new_password);
    if($result){
        header('location: ../index.php?page=users&subpage=userprofile&id='.$id);
    }
}
?>