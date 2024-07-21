<?php
$conn = mysqli_connect("localhost", "root", "", "compsys");

    if (!$conn) {
        $error = "Failed to connect to MySQL: " . mysqli_connect_error();
        header("Location: errorPage.php?error=" . urlencode($error));
        exit();
    }