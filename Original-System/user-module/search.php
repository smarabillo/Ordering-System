<?php
include_once '../classes/user-class.php';

$user = new User();

// Get the search query parameter 'q' from the URL
$q = isset($_GET["q"]) ? $_GET["q"] : "";

if (!empty($q)) {
  $data = $user->list_user_search($q);
} else {
  $data = $user->list_users();
}

$count = 1;

$hint='<table class="table">
        <tr>
            <th>User Id</th>
            <th>Full Name</th>
            <th>Address</th>
            <th>Contact Number</th>
            <th>Access</th>
            <th></th>
        </tr>';

// Check if there's any result
if($data != false){
    // Loop through each product and display its details in a table row
    foreach($data as $value){
        extract($value);
        $hint .= '
            <tr>
            <td>'.$UserId.'</td>
            <td>'.$FullName.'</a></td>
            <td>'.$UserAddress.'</td>
            <td>'.$ContactNum.'</td>
            <td>'.$UserAccess.'</td>
            <td><button class="editbtn"><a href="index.php?page=users&subpage=userprofile&id='.$UserId.'"><i class="fa fa-edit"></i> View</a></button></td>
            </tr>' 
           ;
        $count++;
       
    }
}
$hint .= '</table>';

// Output "No result(s)" if no hint was found or output the search results in a table
echo $hint === "" ? "No result(s)" : $hint;
?>

