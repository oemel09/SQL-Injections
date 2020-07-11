<html lang="en">
<head>
    <title>SQL Injections</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src='index.js'></script>
</head>
<body>

<h2>Login to the wiki</h2>
<a href="register/register.php">Register here</a>
<br /><br />
<p>
    In-Band:
    <button id='wrong'>wrong login</button>
    <button id='correct'>correct login</button>
    <button id='error'>error</button>
    <button id='tautology'>tautology</button>
    <br /><br />
    Error based:
    <button id='error-tables'>tables</button>
    <button id='error-columns'>columns</button>
    <br /><br />
    Boolean based:
    <button id='btrue'>true</button>
    <button id='bfalse'>false</button>
    <br /><br />
    Time based:
    <button id='timebfalse'>db name false</button>
    <button id='timebtrue'>db name true</button>
    <button id='timetable'>tables</button>
</p>
<br /><br />

<form action='' method='post'>
    <table id='insert-table'>
        <tbody>
        <tr>
            <td>
                <label for='username'>Username:</label>
            </td>
            <td>
                <textarea name='username' id='username' class='user-input' rows=6><?php
                    if (isset($_POST['username'])) echo $_POST['username']
                    ?></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label for='password'>Password:</label>
            </td>
            <td>
                <textarea name='password' id='password' class='user-input' rows=5><?php
                    if (isset($_POST['password'])) echo $_POST['password']
                    ?></textarea>
            </td>
        </tr>
        </tbody>
    </table>
    <br />
    <input type='submit' value='Login' name='Login' />
</form>

<?php
include_once('connection.php');
if (isset($_POST['username']) && isset($_POST['password'])) {
    $query = 'SELECT * FROM users WHERE username = "' . $_POST['username'] . '" AND password = "' . $_POST['password'] . '"';
    echo '<pre>' . $query . '</pre>';

    $result = $mysqli->query($query);
    if (!$result) {
        die('Error: ' . $mysqli->error);
    }

    if ($result->num_rows > 0) {
        loginSuccessful($_POST['username']);
    } else {
        loginFailed();
    }

    $mysqli->close();
}

function loginSuccessful($name)
{
    echo 'Welcome back ' . $name . '!<br/>';
    echo '<a href="wiki/wiki.php">Continue here</a>';
}

function loginFailed()
{
    echo 'Wrong username or password.';
}

?>
</body>
</html>
