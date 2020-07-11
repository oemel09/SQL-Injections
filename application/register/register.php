<html lang="en">
<head>
    <title>SQL Injections</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src='register.js'></script>
</head>
<body>

<h2>Please register</h2>

<p>
    <button id='attacker'>attacker account</button>
    <button id='delete'>delete</button>
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
            <td>
                <label for='password'>Password:</label>
            </td>
            <td>
                <input type='text' name='password' id='password' class='user-input'
                       value='<?php if (isset($_POST['password'])) echo $_POST['password'] ?>' />
            </td>
        </tr>
        <tr>
            <td>
                <label for='password-re'>Password again:</label>
            </td>
            <td>
                <input type='text' name='password-re' id='password-re' class='user-input'
                       value='<?php if (isset($_POST['password-re'])) echo $_POST['password-re'] ?>' />
            </td>
        </tr>
        </tbody>
    </table>
    <br />
    <input type='submit' value='Register' name='Register' />
</form>

<?php
include_once('../connection.php');

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password-re'])) {
    if ($_POST['password'] == $_POST['password-re']) {

        $query = 'INSERT INTO users VALUES (?, ?, ?)';
        $stmt = $mysqli->prepare($query);
        $id = NULL;
        $stmt->bind_param('iss', $id, $_POST['username'], $_POST['password']);
        $result = $stmt->execute();

        if ($result) {
            echo 'User ' . $_POST['username'] . ' registered successfully';
        } else {
            echo('Error: ' . $mysqli->error);
        }
    } else {
        echo 'Passwords do not match';
    }

    $mysqli->close();
}
?>
<br /><br />
<a href="../change-pw/change-pw.php">Change password here</a>
</body>
</html>
