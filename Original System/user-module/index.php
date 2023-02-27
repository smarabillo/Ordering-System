<?php
    include_once 'classes/class.user.php';
?>
<div class="submenu"> 
    <a href="index.php?page=usersettings&subpage=usercreate">New User</a>
    <a href="index.php?page=usersettings&subpage=userlist">List Users</a> 
    <a href="index.php?page=usersettings&subpage=userprofile">Profile</a>
</div>
<?php
    switch($subpage){
        case 'usercreate':
            require_once 'user-module/user-create.php';
        break; 
        case 'userlist':
            require_once 'user-module/main.php';
        break; 
        default:
            require_once 'user-module/user-profile.php';
        break;
 
    }
?>