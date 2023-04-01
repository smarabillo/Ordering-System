<h1>User Profile</h1>

<div class="profileblock">
    
    <form method="POST" action="processes/user-process.php?action=update">

        <div class="profileblock-half">

            <div class="profilepic">
                <i class="fa fa-user-circle-o"></i>
            </div>

            <div id="user-id">
                USER ID: <?php echo $user->get_userid($id);?>
            </div>

            <div class="user-options">
                <a class="btn-jsactive" onclick="document.getElementById('id02').style.display='block'" >Change Password</a>  
            </div>
    
        </div>

        <div class="profileblock-half">
            <input type="hidden" id="id" class="input" name="UserId" value="<?php echo $user->get_userid($id);?>" placeholder="">

            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" class="input" name="FullName" value="<?php echo $user->get_fullname($id);?>" placeholder="">
        
            <label for="lname">Address</label>
            <input type="text" id="address" class="input" name="UserAddress" value="<?php echo $user->get_address($id);?>" placeholder="">
            
            <label for="lname">Contact Number</label>
            <input type="text" id="contactnum" class="input" name="ContactNum" value="<?php echo $user->get_contactnum($id);?>" placeholder="">

            <label for="access">Access Level</label>
                <select id="access" name="UserAccess">
                    <option value="admin"  <?php if($user->get_access($id) == "admin"){ echo "selected";};?>>admin</option>
                    <option value="employee"  <?php if($user->get_access($id) == "employee"){ echo "selected";};?>>employee</option>
                </select>

                <button type="submit" value="update"><a>Update</a></button> 
            </form>     
            
            <form method="POST" action="processes/user-process.php?action=delete">
                <span><button type="submit" name="UserId" value="<?php echo $id?>"><a>Delete</a></button></span>
            </form> 
  </div>
</div>    

<div id="id02" class="modal">
  <div #id="form-update" class="modal-content">
      <h1>Update Password</h1>
      <form method="POST" id="passwordForm" action="processes/user-process.php?action=change">
      <input type="hidden" id="UserId" name="UserId" value="<?php echo $id;?>"/>

            <label for="crpassword">Current Password</label>
            <input type="password" id="currentpass" class="input" name="currentpass" placeholder="Current Password"> 
            <label for="npassword">New Password</label>
            <input type="password" id="newpass" class="input" name="newpass" placeholder="New Password"> 
            
            <!-- <label for="copassword">Confirm Password</label>
            <input type="password" id="confirmpass" class="input" name="confirmpass" placeholder="Confirm Password">    -->

       </form> 

        <button onclick="passwordSubmit()">Confirm</button>
        <button onclick="document.getElementById('id02').style.display='none'" style="background-color: crimson;">Cancel</button>

    </div>
</div> 

<script>
    var modal_password = document.getElementById('id02');

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }else if(event.target == modal_password){
            modal_password.style.display = "none";
        }else if(event.target == modal_email){
            modal_email.style.display = "none";
        }
        }
        function passwordSubmit() {
            document.getElementById("passwordForm").submit();
        }
</script> 




