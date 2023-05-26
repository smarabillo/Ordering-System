<h1>Create New User</h1>
<div class="formblock">
    <form method="POST" action="processes/user-process.php?action=new" onsubmit="return validateForm()">

        <div class="formblock-half">

            <label for="FullName">Full Name:</label>
            <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> type="text" id="FullName" class="input" required name="FullName" placeholder="Enter Fullname">

            <label for="UserAddress">Address:</label>
            <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> type="text" id="UserAddress" class="input" required name="UserAddress" placeholder="Enter Address">

            <label for="ContactNum">Contact Number:</label>
            <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> type="text" id="ContactNum" class="input" required name="ContactNum" placeholder="Contact Number">
        </div>

        <div class="formblock-half">
            <label for="UserAccess">Access Level</label>
            <select <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> id="UserAccess" name="UserAccess">
                <option value="Admin">Admin</option>
                <option value="Employee">Employee</option>
            </select>

            <label for="UserPass">Password:</label>
            <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> type="password" id="UserPass" class="input" required name="UserPass" placeholder="Create Password">

            <label for="ConfirmPass">Confirm Password:</label>
            <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> type="password" id="ConfirmPass" class="input" required name="ConfirmPass" placeholder="Confirm Password">
        </div>

        <div class="product button submit">
            <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'hidden';};?> type="submit" value="Submit">
        </div>

    </form>
</div>

<script>
    function validateForm() {
        // Retrieve the form inputs
        var fullName = document.getElementById('FullName').value;
        var userAddress = document.getElementById('UserAddress').value;
        var contactNum = document.getElementById('ContactNum').value;
        var userPass = document.getElementById('UserPass').value;
        var confirmPass = document.getElementById('ConfirmPass').value;

        // Perform validation
        if (fullName === '') {
            alert('Please enter a Full Name.');
            return false;
        }

        if (userAddress === '') {
            alert('Please enter an Address.');
            return false;
        }

        if (contactNum === '') {
            alert('Please enter a Contact Number.');
            return false;
        }

        if (userPass === '') {
            alert('Please enter a Password.');
            return false;
        }

        if (userPass !== confirmPass) {
            alert('Password and Confirm Password do not match.');
            return false;
        }

        return true; // Allow form submission
    }
</script>
