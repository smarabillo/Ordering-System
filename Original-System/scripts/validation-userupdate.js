function validateForm() {
    var fullNameInput = document.getElementById('FullName');
    var userAddressInput = document.getElementById('UserAddress');
    var contactNumInput = document.getElementById('ContactNum');

    var fullNamePattern = /^[A-Za-z\s]+$/;
    var userAddressPattern = /^[A-Za-z\s]+$/;
    var contactNumPattern = /^\d{10}$/;

    if (!fullNamePattern.test(fullNameInput.value)) {
        alert('Enter valid full name, must require Letters only');
        return false;
    }

    if (!userAddressPattern.test(userAddressInput.value)) {
        userAddressInput.reportValidity();
        alert('Enter valid Address, must require Letters only');
        return false;
    }

    if (!contactNumPattern.test(contactNumInput.value)) {
        contactNumInput.reportValidity();
        alert('Enter valid contact number, exactly 10 digits');
        return false;
    }

    return true;
}

function validatePass() {
    var newPasswordInput = document.getElementById('newpass');
    var confirmPasswordInput = document.getElementById('confirmpass');

    var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_]).{8,20}$/;

    if (!passwordPattern.test(newPasswordInput.value)) {
        newPasswordInput.setCustomValidity('Password must contain at least 8 - 20 characters, including lowercase letters, uppercase letters, numbers, and special characters');
        newPasswordInput.reportValidity();
        return false;
    }

    if (newPasswordInput.value !== confirmPasswordInput.value) {
        confirmPasswordInput.setCustomValidity('Passwords must match');
        confirmPasswordInput.reportValidity();
        return false;
    }

    return true;
}

