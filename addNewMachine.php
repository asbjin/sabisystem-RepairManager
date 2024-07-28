<?php

$success = '';
$error = '';
if (isset($_POST['submit'])) {
    $machine_id = $_POST['machine_id'];
    $marque = $_POST['marque'];
    $type = $_POST['type'];
    $debit = $_POST['debit'];
    $localisation = $_POST['localisation'];
    $compteur = $_POST['compteur'];
    $cust_id = $_POST['cust_id'];
    $contrat = $_POST['contrat'];
    $garantie = $_POST['garantie'];

    include 'dbconnect.php';

    // Préparer la requête pour vérifier l'existence du client
    $stmt = $conn->prepare("SELECT * FROM customers WHERE cust_id = ?");
    $stmt->bind_param("i", $cust_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Préparer la requête pour insérer la machine
        $stmt = $conn->prepare("INSERT INTO machines (machine_id, marque, compteur, type, debit, localisation, contrat, garantie, cust_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisssssi", $machine_id, $marque, $compteur, $type, $debit, $localisation, $contrat, $garantie, $cust_id);
        
        if ($stmt->execute()) {
            $success = "Machine ajoutée avec succès. Redirection en cours...";
            header("refresh:3; url=machines.php");
        } else {
            $error = "Erreur lors de l'ajout de la machine : " . $stmt->error;
        }
    } else {
        $error = "Le client n'existe pas dans le système.";
    }

    $stmt->close();
    mysqli_close($conn);
}
?>
