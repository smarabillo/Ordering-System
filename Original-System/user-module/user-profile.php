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
                <a <?php if($user->get_access($UserId) == 'Employee'){ echo 'hidden ';};?> class="btn-jsactive" onclick="document.getElementById('id02').style.display='block'" >Change Password</a>  
            </div>
        </div>

        <div class="profileblock-half">
            <input type="hidden" id="id" class="input" name="UserId" value="<?php echo $user->get_userid($id);?>">

            <label for="fullname">Full Name</label>
            <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> type="text" id="fullname" class="input" name="FullName" value="<?php echo $user->get_fullname($id);?>" placeholder="">
        
            <label for="address">Address</label>
            <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> type="text" id="address" class="input" name="UserAddress" value="<?php echo $user->get_address($id);?>" placeholder="">
            
            <label for="contactnum">Contact Number</label>
            <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> type="text" id="contactnum" class="input" name="ContactNum" value="<?php echo $user->get_contactnum($id);?>" placeholder="">

            <label for="access">Access Level</label>
                <select <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> id="access" name="UserAccess">
                    <option value="Admin"  <?php if($user->get_access($id) == "Admin"){ echo "selected";};?>>Admin</option>
                    <option value="Employee"  <?php if($user->get_access($id) == "Employee"){ echo "selected";};?>>Employee</option>
                </select>

                <button <?php if($user->get_access($UserId) == 'Employee'){ echo 'hidden';};?> type="submit" value="update"><a>Update</a></button> 
            </form>     
            
            <form method="POST" action="processes/user-process.php?action=delete">
                <span><button <?php if($user->get_access($UserId) == 'Employee'){ echo 'hidden';};?> type="submit" name="UserId" value="<?php echo $id?>"><a>Delete</a></button></span>
            </form> 
  </div>
</div>    

<div id="id02" class="modal">
    <div #id="form-update" class="modal-content">
        <h1>Update Password</h1>
        <form method="POST" id="passwordForm" action="processes/user-process.php?action=change">
            <input type="hidden" id="UserId" name="UserId" value="<?php echo $id; ?>" />

            <label for="npassword">New Password</label>
            <input <?php if ($user->get_access($UserId) == 'Employee') {
                echo 'disabled';
            }; ?> type="password" id="newpass" class="input" required name="newpass" placeholder="New Password">

            <label for="copassword">Confirm Password</label>
            <input <?php if ($user->get_access($UserId) == 'Employee') {
                echo 'disabled';
            }; ?> type="password" id="confirmpass" class="input" required name="confirmpass" placeholder="Confirm Password">

        </form>

        <button onclick="passwordSubmit()" <?php if ($user->get_access($UserId) == 'Employee') {echo 'disabled';}; ?>>Confirm</button>
        <button onclick="document.getElementById('id02').style.display='none'" style="background-color: crimson; ">Cancel</button>

    </div>
</div>

<script>
    var modal_password = document.getElementById('id02');

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        } else if (event.target == modal_password) {
            modal_password.style.display = "none";
        } else if (event.target == modal_email) {
            modal_email.style.display = "none";
        }
    }

    function passwordSubmit() {
        // Retrieve the form inputs
        var newPass = document.getElementById('newpass').value;
        var confirmPass = document.getElementById('confirmpass').value;

        // Perform validation

        if (newPass === '') {
            alert('Please enter a new password');
            return;
        }

        if (confirmPass === '') {
            alert('Please confirm the password');
            return;
        }

        if (newPass !== confirmPass) {
            alert('Passwords do not match');
            return;
        }

        // Submit the form
        document.getElementById('passwordForm').submit();
    }
</script>
