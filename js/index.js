function togglePwd() {
    var p = document.getElementById('pwd');
    p.type = p.type === 'password' ? 'text' : 'password';
}

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