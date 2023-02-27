<?php
    include_once 'classes/class.user.php';
    include 'config/config.php';

    $page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
    $subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
    $action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
    $id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';
    
    $user = new User();
    if(!$user->get_session()){
        header("location: login.php");
    }
    $UserId = $user->get_user($_SESSION['UserId']);
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <title>Neneng's Sizzling Eatery</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Sofia+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <header>
            <nav class="nav">
                <ul>
                    <li><a href="index.php"><i class="fa fa-home"></i>Dashboard</a></li>
                    <li><a href="orders.php"><i class="fa fa-shopping-cart"></i>Orders</a></li>
                    <li><a href="records.php"><i class="fa fa-book"></i>Records</a></li>
                    <li style="float:right"><a href="logout.php"><span><i class="fa fa-sign-out"></i>Logout</a></span></li>
                    <li style="float:right"><a href="index.php?page=settings"><i class="fa fa-gear"></i>Settings</a></li>
                    <li style="float:right"><a href="index.php?page=usersettings"><i class="fa fa-user"></i><?php echo $user->get_fullname($UserId);?></a></li>
                </ul>
            </nav>  
        <?php
        switch($page){
            case 'settings':
                require_once 'settings-module/index.php';
            break; 
            case 'usersettings':
                require_once 'user-module/index.php';
            break; 
            default:
                require_once 'main.php';
            break; 
        }
        ?>
    </body>
</html>
