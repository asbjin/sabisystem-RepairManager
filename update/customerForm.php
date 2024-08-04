<?php
if (isset($_GET['update'])) {
   
    include '../dbconnect.php'; // Adjust the path according to your directory structure

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $id = $_POST['record'];
    $sql = "SELECT * FROM customers WHERE cust_id = $id";
    $res = mysqli_query($conn, $sql);

    if (!$res) {
        echo 'Query failed: ' . $sql . ' Error: ' . mysqli_error($conn);
        exit();
    } else {
        $row = mysqli_fetch_array($res);
        $nom_entreprise = $row['nom_entreprise'];
        $adresse = $row['adresse'];
        $number_register = $row['number_register'];
        $nom_contact = $row['nom_contact'];
        $tel = $row['tel'];
    }

    mysqli_free_result($res);
    mysqli_close($conn);
} 
?>
