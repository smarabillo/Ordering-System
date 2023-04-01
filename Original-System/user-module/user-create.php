<h1>Create New User</h1>
<div class="formblock">
    <form method="POST" action="processes/user-process.php?action=new">

        <div class="formblock-half">
            <label for="FullName">Full Name: </label>
            <input type="text" id="FullName" class="input" name="FullName" placeholder="Enter Fullname">

            <label for="UserAddress">Address:</label>
            <input type="text" id="UserAddress" class="input" name="UserAddress" placeholder="Enter Address">
            
            <label for="ContactNum">Contact Number:</label>
            <input type="text" id="ContactNum" class="input" name="ContactNum" placeholder="Contact Number">
        </div>

        <div class="formblock-half">
            <label for="UserPass">Password: </label>
            <input type="text" id="UserPass" class="input" name="UserPass" placeholder="Create Password">

            <label for="UserAccess">Access Level</label>
                <select id="UserAccess" name="UserAccess">
                    <option value="admin">admin</option>
                    <option value="employee">employee</option>
                </select>
        </div>

        <div class="prodcut button submit">
            <input type="submit" value="Submit">
        </div>
        
    </form>
</div>
