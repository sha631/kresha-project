<?php
    date_default_timezone_set("Asia/Manila");
    session_start();

    define("DB_HOST", "localhost");
    define("DB_USERNAME", "root");
    define("DB_PASSWORD", "");
    define("DB_NAME", "instambay_foodhub");

    $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($conn->connect_errno) {
        echo "Failed to connect to the database: " . $conn->connect_error;
        exit();
    }

    $conn->set_charset("utf8mb4");
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

?>
