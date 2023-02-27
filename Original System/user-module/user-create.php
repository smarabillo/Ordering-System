<h1>Create New User</h1>
<div class="formblock">
    <form method="POST" action="processes/user-process.php?action=new">

        <div class="formblock-half">
            <label for="UserId">User Id: </label>
            <input type="text" id="id" class="input" name="UserId" placeholder="">

            <label for="FullName">Full Name: </label>
            <input type="text" id="fullname" class="input" name="FullName" placeholder="">

            <label for="UserAddress">Address:</label>
            <input type="text" id="address" class="input" name="UserAddress" placeholder="">
        </div>

        <div class="formblock-half">
            <label for="ContactNum">Contact Number:</label>
            <input type="text" id="contactnum" class="input" name="ContactNum" placeholder="">

            <label for="UserPass">Password: </label>
            <input type="text" id="password" class="input" name="UserPass" placeholder="">

            <label for="UserAccess">Access Level</label>
                <select id="access" name="UserAccess">
                    <option value="admin">Admin</option>
                    <option value="employee">Employee</option>
                </select>
        </div>

        <div id="button-block">
            <input type="submit" value="Submit">
        </div>

    </form>
</div>
