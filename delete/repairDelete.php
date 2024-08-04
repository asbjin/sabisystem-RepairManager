<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$deleted = '';
$notDeleted = '';

// Inclure le fichier de connexion à la base de données
include '../dbconnect.php';

if (isset($_POST['delete'])) {
    $rep_id = $_POST['rep_delete'];

    if ($rep_id == '' || !is_numeric($rep_id)) {
        $notDeleted = "You did not complete the delete form correctly";
        header("Location: ../repairs.php?error=" . urlencode($notDeleted));
        exit();
    } else {
        // Commencer une transaction
        mysqli_begin_transaction($conn);

        try {
           
            // Supprimer le client de la table customers
            $sql_delete_customer = "DELETE FROM repairs WHERE rep_id = ?";
            $stmt_delete_customer = mysqli_prepare($conn, $sql_delete_customer);

            if (!$stmt_delete_customer) {
                throw new Exception("Failed to prepare delete statement: " . mysqli_error($conn));
            }

            mysqli_stmt_bind_param($stmt_delete_customer, "i", $rep_id);
            mysqli_stmt_execute($stmt_delete_customer);

            // Confirmer la transaction
            mysqli_commit($conn);

            $deleted = "Repair no. " . $rep_id . " has been deleted successfully";
            header("Location: ../repairs.php?success=" . urlencode($deleted));
        } catch (Exception $e) {
            // Annuler la transaction en cas d'erreur
            mysqli_rollback($conn);
            $notDeleted = "Error: " . $e->getMessage();
            header("Location: ../repairs.php?error=" . urlencode($notDeleted));
        }

        // Fermer les statements
        if (isset($stmt_update_repairs)) {
            mysqli_stmt_close($stmt_update_repairs);
        }
        if (isset($stmt_delete_customer)) {
            mysqli_stmt_close($stmt_delete_customer);
        }

        // Fermer la connexion
        mysqli_close($conn);
    }
}
?>


