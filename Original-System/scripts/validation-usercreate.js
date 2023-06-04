function validateForm() {
    // Retrieve the form inputs
    var fullName = document.getElementById('FullName').value;
    var userAddress = document.getElementById('UserAddress').value;
    var contactNum = document.getElementById('ContactNum').value;
    var userPass = document.getElementById('UserPass').value;
    var confirmPass = document.getElementById('ConfirmPass').value;

    // Regular expression patterns
    var namePattern = /^[a-zA-Z ]+$/; // Only alphabets and spaces allowed
    var addressPattern = /^[a-zA-Z0-9\s,.'-]+$/; // Alphabets, numbers, spaces, and common address characters allowed
    var contactPattern = /^\d{10}$/; // Exactly 10 digits allowed
    var passPattern = /^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/; 

    // Validate Full Name
    if (!namePattern.test(fullName)) {
        alert('Please enter a valid Full Name');
        return false;
    }

    // Validate Address
    if (!addressPattern.test(userAddress)) {
        alert('Please enter a valid Address');
        return false;
    }

    // Validate Contact Number
    if (!contactPattern.test(contactNum)) {
        alert('Please enter a valid Contact Number (exactly 10 digits are allowed)');
        return false;
    }

    //Validate Password
    if (!passPattern.test(userPass)) {
        alert('Password must contain at least 8 - 20 characters, including lowercase letters, uppercase letters, numbers, and special characters');
        return false;
    }

    // Confirm if Passwords Match
    if (userPass !== confirmPass) {
        alert('Passwords do not match');
        return false;
    }

    return true; // Allow form submission
}


   