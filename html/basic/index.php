<?php
require_once '../config.php';

$db = new PDO($DB_URI);
$method = $_SERVER['REQUEST_METHOD'];   

if ($method === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='${username}' AND password='${password}'";
    foreach ($db->query($sql) as $row) {
        echo "<h1>Logged in as ${row['username']}</h1>";
    }
}
?>
<!doctype html>
<html>
<head>
<title>Login</title>
</head>
<body>
<form method='post'>
    <input name="username" type="plaintext" />
    <input name="password" type="password" />
    <button type="submit">Login</button>
</form>
</body>
</html>