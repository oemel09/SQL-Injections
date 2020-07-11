<html lang="en">
<head>
    <title>SQL Injections</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src='wiki.js'></script>
</head>
<body>

<h2>Here are some programming languages</h2>

<p>
    Normal search:
    <button id='language'>language</button>
    <button id='script'>script</button>
    <br /><br />
    UNION based:
    <button id='version'>version</button>
    <button id='users'>users</button>
    <br /><br />
    Boolean based:
    <button id='btrue'>true</button>
    <button id='bfalse'>false</button>
    <button id='dbname'>dbname</button>
    <button id='letters'>letters</button>
</p>

<form action='' method='post'>
    <table id='insert-table'>
        <tbody>
        <tr>
            <td>
                <label for='query'>Search for:</label>
            </td>
            <td>
                <textarea type='text' name='query' id='query' class='user-input' rows=5><?php
                    if (isset($_POST['query'])) echo $_POST['query']
                    ?></textarea>
            </td>
        </tr>
        </tbody>
    </table>
    <br />
    <input type='submit' value='Search' name='search' />
</form>

<table id='data-table'>
    <tbody>
    <tr>
        <th>Name</th>
        <th>Description</th>
    </tr>

    <?php
    include_once('../connection.php');
    if (isset($_POST['query'])) {
        $query = 'SELECT name, description FROM languages WHERE description LIKE "%' . $_POST['query'] . '%"';
        echo '<pre>' . $query . '</pre>';

        $result = $mysqli->query($query);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['name'] . '</td><td>' . $row['description'] . '</td>';
                echo '</tr>';
            }
        }

        $mysqli->close();
    }
    ?>
    </tbody>
</table>
<br />
<a href="../index.php">Logout</a>
</body>
</html>
