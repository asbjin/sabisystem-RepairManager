<?php
require_once 'config.php'; // Include the config file

if (isset($_POST['record']) and is_numeric($_POST['record'])) {
    $cid = $_POST['record'];

    // Use the $mysqli object from the config file
    $sql = "SELECT * FROM customers WHERE cust_id=?"; // Use a prepared statement to prevent SQL injection
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $cid); // Bind the $cid variable to the prepared statement
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        echo('Query failed ' . $sql . ' Error:' . $mysqli->error);
        exit();
    } else {
        $row = $result->fetch_assoc(); // Use fetch_assoc to retrieve the row as an associative array
        $id = $row['cust_id'];
        $nom_entreprise = $row['nom_entreprise'];
        $adresse = $row['adresse'];
        $number_register = $row['number_register'];
        $nom_contact = $row['nom_contact'];
        $tel = $row['tel'];
    }

    // Close the statement and connection
    $stmt->close();
    $mysqli->close();
}