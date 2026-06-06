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