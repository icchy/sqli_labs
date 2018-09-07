<?php
$DB_PATH = "/tmp/db.sqlite3";
$DB_URI = "sqlite:$DB_PATH";

// init
if (!file_exists($DB_PATH)) {
    $db = new PDO($DB_URI);
    $db->exec("CREATE TABLE IF NOT EXISTS users(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT,
        password TEXT
    )");
    $flag = 'FLAG{'.bin2hex(openssl_random_pseudo_bytes(16)).'}';
    $db->exec("INSERT INTO users(username, password) values('admin', '${flag}')");
    $db->exec("INSERT INTO users(username, password) values('user', 'user')");
    $db = null;
}
