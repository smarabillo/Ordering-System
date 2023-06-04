<script src="scripts/validation-userupdate.js"></script>

<h1>User Profile</h1>
<div class="profileblock">
    <form method="POST" action="processes/user-process.php?action=update" onsubmit="return validateForm()">

        <!-- Profile Image and User Id Block -->
        <div class="profileblock-half">
            <div class="profilepic">
                <i class="fa fa-user-circle-o"></i>
            </div>
            <div id="user-id">
                USER ID: <?php echo $user->get_userid($id);?>
            </div>
            <div class="user-options">
                <a <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled ';};?> class="btn-jsactive" onclick="document.getElementById('id02').style.display='block'">Change Password</a>   
            </div>
        </div>

        <!-- User Details Update -->
        <div class="profileblock-half">
            <input type="hidden" id="id" class="input" name="UserId" value="<?php echo $user->get_userid($id);?>">

            <label for="fullname">Full Name</label>
            <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> type="text" id="FullName" class="input" required name="FullName"  value="<?php echo $user->get_fullname($id);?>" placeholder="Enter Full Name" oninvalid="this.setCustomValidity('Enter valid Full Name')" oninput="this.setCustomValidity('')">
        
            <label for="address">Address</label>
            <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> type="text" id="UserAddress" class="input" required name="UserAddress"  value="<?php echo $user->get_address($id);?>" placeholder="Enter Address" oninvalid="this.setCustomValidity('Enter valid Address')" oninput="this.setCustomValidity('')">
            
            <label for="contactnum">Contact Number</label>
            <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> type="text" id="ContactNum" class="input" required name="ContactNum"  value="<?php echo $user->get_contactnum($id);?>" placeholder="Enter Contact Number" oninvalid="this.setCustomValidity('Enter valid Contact Number')" oninput="this.setCustomValidity('')">

            <label for="access">Access Level</label>
            <select <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> id="access" name="UserAccess">
                <option value="Admin"  <?php if($user->get_access($id) == "Admin"){ echo "selected";};?>>Admin</option>
                <option value="Employee"  <?php if($user->get_access($id) == "Employee"){ echo "selected";};?>>Employee</option>
            </select>

            <button <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> type="submit" value="Submit"><a>Update</a></button> 
        </form>      
        <form method="POST" action="processes/user-process.php?action=delete">
            <span><button <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> type="submit" name="UserId" value="<?php echo $id?>"><a>Delete</a></button></span>
        </form> 
    </div>    

    <!-- Change Password Button  -->
    <div id="id02" class="modal">
        <div id="form-update" class="modal-content">
            <h1>Update Password</h1>
            <form method="POST" id="passwordForm" action="processes/user-process.php?action=change" onsubmit="return validatePass()">
                <input type="hidden" id="UserId" name="UserId" value="<?php echo $id; ?>" />
                <div class="password-container">
                    <label for="npassword">New Password</label>
                    <input <?php if ($user->get_access($UserId) == 'Employee') {echo 'disabled';}; ?> type="password" id="newpass" class="input" required name="newpass" placeholder="New Password" 
                    oninvalid="this.setCustomValidity(newPassinput.setCustomValidity)" oninput="this.setCustomValidity('')">
                    <label for="copassword">Confirm Password</label>
                    <input <?php if ($user->get_access($UserId) == 'Employee') { echo 'disabled';}; ?> type="password" id="confirmpass" class="input" required name="confirmpass" placeholder="Confirm Password" 
                    oninvalid="this.setCustomValidity(confirmPasswordInput.setCustomValidity)" oninput="this.setCustomValidity('')">
                </div>
                <button onclick="passwordSubmit()" <?php if ($user->get_access($UserId) == 'Employee') {echo 'hidden';}; ?>>Confirm</button>
                <button onclick="document.getElementById('id02').style.display='none'" style="background-color: crimson;">Cancel</button>
            </form>
        </div>
        </div>
</div>
