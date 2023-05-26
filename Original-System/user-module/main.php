<div class="submenusearch">
  <a>Search<input type="text" id="search" name="search" placeholder="search users " onkeyup="showResults(this.value)"></a>
</div>
<div class="download-button">
    <div class = "download-button-print">
            <form method="POST "action="reports/xls-user.php?action=print">
                <a class="editbtn"><i class="fa fa-download"></i> Excel</a>
            </form> 
            <form method="POST "action="reports/pdf-user.php?action=print">
                <span><a class="editbtn"><i class="fa fa-download"></i> PDF</a></span>
            </form>
    </div>
</div>
<h1>User List</h1>
    <div id="search-result">
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
                    <td><button class="editbtn"><a href="index.php?page=users&subpage=userprofile&id=<?php echo $UserId;?>"><i class="fa fa-edit"></i> View</a></button></td>
                </tr>
              <?php
              $count++;
            }
        }else{
            echo "No Record Found.";
        }
    ?>
 </table>

