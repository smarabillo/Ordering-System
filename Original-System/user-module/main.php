
<h1>List of Users</h1>
    <table class="table">
        <tr>
            <th>User Id</th>
            <th>Full Name</th>
            <th>Address</th>
            <th>Contact Number</th>
            <th>Access</th>
            <th>Edit</th>
            
        </tr>
        <?php
        
        if($user->list_users() != false){
            foreach($user->list_users() as $value){
            extract($value);
            ?>
                <tr>
                    <td><?php echo $UserId;?></td>
                    <td><?php echo $FullName;?></td>
                    <td><?php echo $UserAddress;?></td>
                    <td><?php echo $ContactNum;?></td>
                    <td><?php echo $UserAccess;?></td>
                    <td>
                    <button class="editbtn"><a href="index.php?page=users&subpage=userprofile&id=<?php echo $UserId;?>"><i class="fa fa-edit"></i> edit</a></button>
                    </td>
                </tr>
            <?php
                $count++;
            }
        }else{
            echo "No Record Found.";
        }
        ?>
    </table>
