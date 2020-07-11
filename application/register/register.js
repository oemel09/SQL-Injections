window.onload = function() {
    const username = document.getElementById('username');
    const password = document.getElementById('password');
    const password_re = document.getElementById('password-re');
    
    const attacker = document.getElementById('attacker');
    attacker.onclick = () => {
        username.value = 'admin"-- ';
        password.value = 'secret password';
        password_re.value = 'secret password';
    }

    const del = document.getElementById('delete');
    del.onclick = () => {
        fetch('delete-user.php')
            .then((e) => {console.log(e)})
            .catch((e) => {console.log(e)});
    }
}
