function requestOTP(e) {
    // php POST, acc validation and email otp
    e.preventDefault();
    alert("OTP requested. OTP sent to registered email.");
    location.href = 'forget-password-otp.php';
}

function validateOTP(e) {
    // validate otp
    e.preventDefault();
    alert("OTP verified successfully.");
    location.href = 'forget-password-reset.php';
}

function resetPassword(e) {
    // php POST reset password
    e.preventDefault();
    alert("Password Reset Sucessfully.\nPlease Login With Your New Password.");
    location.href = '../';
}

// password toggle
document.addEventListener("DOMContentLoaded", () => {
    const toggle = document.querySelector(".toggle-password");
    const password = document.querySelector("#pwd");

    if (toggle && password) {
        toggle.addEventListener("click", () => {
            if (password.type === "password") {
                password.type = "text";
                toggle.src = "assets/icons/eye-crossed.png";
            } else {
                password.type = "password";
                toggle.src = "assets/icons/eye.png";
            }
        });
    }
});

function doLogin(e) {
    e.preventDefault();
    var uid = document.getElementById('uid').value.trim().toUpperCase();
    var role = 'student';
    if (uid.startsWith('A')) role = 'advisor';
    else if (uid.startsWith('M')) role = 'admin';
    var map = {
        student: 'student/dashboard-student.php',
        advisor: 'advisor/dashboard-advisor.php',
        admin: 'admin/dashboard-admin.php'
    };
    location.href = map[role];
    return false;
}