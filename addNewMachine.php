<?php


$success = '';
$error = '';
if (isset($_POST['submit'])) {
    // Définir les variables
    $machine_id = $_POST['machine_id'];
    $type = $_POST['type'];
    $localisation = $_POST['localisation'];
    $compteur = $_POST['compteur'];
    $cust_id = $_POST['cust_id'];

    include 'dbconnect.php';
    // Pour protéger contre les injections SQL
    $machine_id = mysqli_real_escape_string($conn, stripslashes($machine_id));
    $type = mysqli_real_escape_string($conn, stripslashes($type));
    $localisation = mysqli_real_escape_string($conn, stripslashes($localisation));
    $compteur = mysqli_real_escape_string($conn, stripslashes($compteur));
    $cust_id = mysqli_real_escape_string($conn, stripslashes($cust_id));

    // Vérifier si le client existe
    $query = "SELECT * FROM customers WHERE cust_id = '$cust_id'";
    $valid = mysqli_query($conn, $query);
    if (!$valid) {
        $error = "Could not connect to the database!";
    } else {
        
        if (mysqli_num_rows($valid) > 0) {
            // Le client existe, ajouter la machine
            $sql = "INSERT INTO machines (machine_id, compteur, type, localisation, cust_id)
                    VALUES ('$machine_id', '$compteur', '$type', '$localisation', '$cust_id')";
            $res = mysqli_query($conn, $sql);

            if (!$res) {
                $error = "Error inserting the machine: " . mysqli_error($conn);
            } else {
                if (mysqli_affected_rows($conn) == 1) {
                    $success = "Machine added successfully. Redirecting.....";
                    header("refresh:3; url=machines.php");
                } else {
                    $error = "Could not add the machine due to a system error!";
                }
            }
        } else {
            $error = "The customer does not exist in the system.";
        }
    }
    mysqli_close($conn);
}
?>
