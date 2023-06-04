<script src="scripts/validation-usercreate.js"></script>

<h1>Create New User</h1>
<div class="formblock">
    <form method="POST" action="processes/user-process.php?action=new" onsubmit="return validateForm()">

        <div class="formblock-half">

            <label for="FullName">Full Name:</label>
            <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> type="text" id="FullName" class="input" required name="FullName"  placeholder="Enter Fullname" oninvalid="this.setCustomValidity('Enter Valid Full Name')" oninput="this.setCustomValidity('')">
            
            <label for="UserAddress">Address:</label>
            <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> type="text" id="UserAddress" class="input" required name="UserAddress"   placeholder="Enter Address" oninvalid="this.setCustomValidity('Enter Valid Address')"oninput="this.setCustomValidity('')">

            <label for="ContactNum">Contact Number:</label>
            <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> type="text" id="ContactNum" class="input" required name="ContactNum" placeholder="Contact Number" oninvalid="this.setCustomValidity('Enter Contact Number')" oninput="this.setCustomValidity('')">
        </div>

        <div class="formblock-half">
            <label for="UserAccess">Access Level</label>
            <select <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> id="UserAccess" name="UserAccess">
                <option value="Admin">Admin</option>
                <option value="Employee">Employee</option>
            </select>
                <div class="password-container">
                    <label for="UserPass">Password:</label>
                    <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> type="password" id="UserPass" class="input" required name="UserPass" placeholder="Create Password" oninvalid="this.setCustomValidity('Enter Valid Password')" oninput="this.setCustomValidity('')">
                    <i class="fa fa-eye" id="eye"></i>
    
                    <label for="ConfirmPass">Confirm Password:</label>
                    <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> type="password" id="ConfirmPass" class="input" required name="ConfirmPass" placeholder="Confirm Password" oninvalid="this.setCustomValidity('Password Does Not Match')" oninput="this.setCustomValidity('')">
                 
                </div>
        </div>
        <div class="product button submit">
            <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'hidden';};?> type="submit" value="Submit">
        </div>
    </form>
</div>


<script>
    const passwordInput = document.querySelector("#UserPass")
    const eye = document.querySelector("#eye")

    eye.addEventListener("click", function(){
        this.classList.toggle("fa-eye-slash")
        const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
        passwordInput.setAttribute("type", type)  
    })
</script>
