<?php
    include_once 'classes/user-class.php';
?>
<div class="submenu">
    <?php if($user->get_access($UserId) !== 'Employee'){?>
        <a href="index.php?page=users&subpage=default">User Settings</a>
    <?php }?>
    <a href="index.php?page=settings&subpage=default">System Settings</a>
</div>
<?php
    switch($subpage){
        case 'usercreate':
            require_once 'user-module/user-create.php';
        break;
        case 'userprofile':
            require_once 'user-module/user-profile.php';
        break; 
        default:
            require_once 'settings-module/index.php';
        break;
 
    }
?>