<html lang="en">
<head>
    <title>SQL Injections</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src='change-pw.js'></script>
</head>
<body>

<h2>Change your password</h2>

<p>
    <button id='attacker'>attacker</button>
    <button id='change-back'>change back</button>
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
                <input type='text' name='username' id='username' class='user-input'
                       value='<?php if (isset($_POST['username'])) echo $_POST['username'] ?>' />
            </td>
        </tr>
        <tr>
            <td><label for='password-old'>Old password:</label></td>
            <td>
                <input type='text' name='password-old' id='password-old' class='user-input'
                       value='<?php if (isset($_POST['password-old'])) echo $_POST['password-old'] ?>' />
            </td>
        </tr>
        <tr>
            <td><label for='password-new'>Password:</label></td>
            <td>
                <input type='text' name='password-new' id='password-new' class='user-input'
                       value='<?php if (isset($_POST['password-new'])) echo $_POST['password-new'] ?>' />
            </td>
        </tr>
        <tr>
            <td><label for='password-re'>Password again:</label></td>
            <td>
                <input type='text' name='password-re' id='password-re' class='user-input'
                       value='<?php if (isset($_POST['password-re'])) echo $_POST['password-re'] ?>' />
            </td>
        </tr>
        </tbody>
    </table>
    <br />
    <input type='submit' value='Update' name='Update' />
</form>

<?php
include_once('../connection.php');
if (isset($_POST['username']) && isset($_POST['password-old']) && isset($_POST['password-new']) && isset($_POST['password-re'])) {

    $username = $_POST['username'];
    $password_old = $_POST['password-old'];
    $password_new = $_POST['password-new'];
    $username_re = $_POST['password-re'];

    $query = 'SELECT * FROM users WHERE username = ? AND password = ?';
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ss', $username, $password_old);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if ($result) {
        $query = 'UPDATE users SET password = "' . $password_new . '" WHERE username = "' . $result['username'] . '"';

        echo '<pre>' . $query . '</pre>';

        $result = $mysqli->query($query);
        if ($result) {
            echo 'Password of ' . $username . ' changed successfully';
        } else {
            echo('Error: ' . $mysqli->error);
        }
    } else {
        echo('Error: ' . $mysqli->error);
    }

    $mysqli->close();
}
?>

<br /><br />
<a href="../index.php">Logout</a>
</body>
</html>
