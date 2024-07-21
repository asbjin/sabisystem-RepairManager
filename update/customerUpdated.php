<?php
// Connexion à la base de données
$success = '';
$error = '';

if (isset($_POST['submit'])) {
    include 'dbconnect.php';

    if (!$conn) {
        $error = "Failed to connect to MySQL: " . mysqli_connect_error();
        header("Location: errorPage.php?error=" . urlencode($error));
        exit();
    }
    // nom_entreprise  adresse number_register nom_contact tel_contact ud_tel_contact
    // Récupérer les données du formulaire
    $ud_id = mysqli_real_escape_string($conn, $_POST['ud_id']);
    $ud_nom_entreprise = mysqli_real_escape_string($conn, $_POST['ud_nom_entreprise']);
    $ud_adresse = mysqli_real_escape_string($conn, $_POST['ud_adresse']);
    $ud_number_register = mysqli_real_escape_string($conn, $_POST['ud_number_register']);
    $ud_nom_contact = mysqli_real_escape_string($conn, $_POST['ud_nom_contact']);
    $ud_tel = mysqli_real_escape_string($conn, $_POST['ud_tel']);

    // Utiliser une requête préparée
    $sql = "UPDATE customers SET nom_entreprise=?, adresse=?, number_register=?, nom_contact=?, tel=? WHERE cust_id=?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssii", $nom_entreprise, $ud_adresse, $ud_number_register, $ud_nom_contact, $ud_tel, $ud_id);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $success = "Customer details have been updated successfully! Redirecting....";
            header("refresh:2; url=customer.php");
        } else {
            $error = "You have not amended anything! Redirecting....";
            header("refresh:2; url=customer.php");
        }

        mysqli_stmt_close($stmt);
    } else {
        $error = "Failed to prepare statement: " . mysqli_error($conn);
        header("Location: errorPage.php?error=" . urlencode($error));
        exit();
    }

    // Afficher les résultats mis à jour
    $sql = "SELECT * FROM customers WHERE cust_id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $ud_id);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        if ($res) {
            $row = mysqli_fetch_array($res);
            $id = $ud_id;
            $nom_entreprise = $row['nom_entreprise'];
            $adresse = $row['adresse'];
            $number_register = $row['number_register'];
            $nom_contact = $row['nom_contact'];
            $tel = $row['tel'];

            mysqli_free_result($res);
        } else {
            $error = "Query failed: " . mysqli_error($conn);
            header("Location: errorPage.php?error=" . urlencode($error));
            exit();
        }

        mysqli_stmt_close($stmt);
    } else {
        $error = "Failed to prepare statement: " . mysqli_error($conn);
        header("Location: errorPage.php?error=" . urlencode($error));
        exit();
    }

    // Fermer la connexion
    mysqli_close($conn);
}
?>
