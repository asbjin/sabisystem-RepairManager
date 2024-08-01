<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$success = '';
$error = '';

if (isset($_POST['submit'])) {
    $machine_id = $_POST['machine_id'];
    $marque = $_POST['marque'];
    $type = $_POST['type'];
    $debit = $_POST['debit'];
    $localisation = $_POST['localisation'];
    $compteur = $_POST['compteur'];
    $cust_id = $_POST['customer_id'];
    $contrat = $_POST['contrat'];
    $garantie = $_POST['garantie'];

    include 'dbconnect.php';

    // To protect MySQL injection for Security purpose
    $machine_id = stripslashes($machine_id);
    $marque = stripslashes($marque);
    $type = stripslashes($type);
    $debit = stripslashes($debit);
    $localisation = stripslashes($localisation);
    $compteur = stripslashes($compteur);
    $cust_id = stripslashes($cust_id);
    $contrat = stripslashes($contrat);
    $garantie = stripslashes($garantie);

    $machine_id = mysqli_real_escape_string($conn, $machine_id);
    $marque = mysqli_real_escape_string($conn, $marque);
    $type = mysqli_real_escape_string($conn, $type);
    $debit = mysqli_real_escape_string($conn, $debit);
    $localisation = mysqli_real_escape_string($conn, $localisation);
    $compteur = mysqli_real_escape_string($conn, $compteur);
    $cust_id = mysqli_real_escape_string($conn, $cust_id);
    $contrat = mysqli_real_escape_string($conn, $contrat);
    $garantie = mysqli_real_escape_string($conn, $garantie);

    // Check if the machine with the same serial number already exists
    $stmt = $conn->prepare("SELECT * FROM machines WHERE machine_id = ?");
    $stmt->bind_param("s", $machine_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Machine with the same serial number already exists
        $error = "Erreur : Une machine avec ce numéro de série existe déjà.";
    } else {
        // Insert the machine
        $stmt = $conn->prepare("INSERT INTO machines (machine_id, marque, compteur, type, debit, localisation, contrat, garantie, cust_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisssssi", $machine_id, $marque, $compteur, $type, $debit, $localisation, $contrat, $garantie, $cust_id);

        if ($stmt->execute()) {
            $success = "Machine ajoutée avec succès. Redirection en cours...";
            header("refresh:3; url=machines.php");
            
        } else {
            $error = "Erreur lors de l'ajout de la machine : " . $stmt->error;
        }
    }

    $stmt->close();
    mysqli_close($conn);
}
?>
