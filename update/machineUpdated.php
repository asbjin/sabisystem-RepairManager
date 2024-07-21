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

    // Récupérer les données du formulaire
    $ud_machine_id = mysqli_real_escape_string($conn, $_POST['machine_id']);
   
    $ud_type = mysqli_real_escape_string($conn, $_POST['type']);
    $ud_localisation = mysqli_real_escape_string($conn, $_POST['localisation']);
    $ud_cust_id = mysqli_real_escape_string($conn, $_POST['cust_id']);
    $ud_compteur = mysqli_real_escape_string($conn, $_POST['compteur']);

    // Utiliser une requête préparée
    $sql = "UPDATE machines SET type=?, localisation=?, cust_id=?, compteur=? WHERE machine_id=?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssiis",  $ud_type, $ud_localisation, $ud_cust_id, $ud_compteur, $ud_machine_id);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $success = "Machine details have been updated successfully! Redirecting....";
            header("refresh:2; url=machines.php");
        } else {
            $error = "You have not amended anything! Redirecting....";
            header("refresh:2; url=machines.php");
        }

        mysqli_stmt_close($stmt);
    } else {
        $error = "Failed to prepare statement: " . mysqli_error($conn);
        header("Location: errorPage.php?error=" . urlencode($error));
        exit();
    }

    // Afficher les résultats mis à jour
    $sql = "SELECT * FROM machines WHERE machine_id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $ud_machine_id);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        if ($res) {
            $row = mysqli_fetch_array($res);
            $machine_id = $ud_machine_id;
            $type = $row['type'];
            $localisation = $row['localisation'];
            $cust_id = $row['cust_id'];
            $compteur = $row['compteur'];

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
