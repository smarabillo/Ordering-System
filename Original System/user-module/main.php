<!-- User List -->
<h1>List of Users</h1>
    <table class="table">
        <tr>
            <th>User Id</th>
            <th>Full Name</th>
            <th>Address</th>
            <th>Contact Number</th>
            <th>Access</th>
        </tr>
        <?php

        $count = 1;
        $count = 1;

        if($user->list_users() != false){
            foreach($user->list_users() as $value){
            extract($value);
            ?>
                <tr>
                    <td><?php echo $UserId;?></td>
                    <td><a style="text-decoration: none" color="black" href="index.php?page=usersettings&action=userlist<?php echo $UserId;?>"><?php echo $FullName;?></td>
                    <td><?php echo $UserAddress;?></td>
                    <td><?php echo $ContactNum;?></td>
                    <td><?php echo $UserAccess;?></td>
                </tr>
            <?php
                $UserId++;
            }
        }else{
            echo "No Record Found.";
        }
        ?>
    </table>
