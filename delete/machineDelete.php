<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$deleted = '';
$notDeleted = '';

// Inclure le fichier de connexion à la base de données
include '../dbconnect.php';

if (isset($_POST['delete'])) {
    $machine_id = $_POST['machine_id'];

    if ($machine_id == '' ) {
        $notDeleted = "You did not complete the delete form correctly";
        header("Location: ../machines.php?error=" . urlencode($notDeleted));
        exit();
    } else {
        // Commencer une transaction
        mysqli_begin_transaction($conn);

        try {
           
            // Supprimer le client de la table machines
            $sql_delete_machine = "DELETE FROM machines WHERE machine_id = ?";
            $stmt_delete_machine = mysqli_prepare($conn, $sql_delete_machine);

            if (!$stmt_delete_machine) {
                throw new Exception("Failed to prepare delete statement: " . mysqli_error($conn));
            }

            mysqli_stmt_bind_param($stmt_delete_machine, "s", $machine_id);
            mysqli_stmt_execute($stmt_delete_machine);

            // Confirmer la transaction
            mysqli_commit($conn);

            $deleted = "Repair no. " . $machine_id . " has been deleted successfully";
            header("Location: ../machines.php?success=" . urlencode($deleted));
        } catch (Exception $e) {
            // Annuler la transaction en cas d'erreur
            mysqli_rollback($conn);
            $notDeleted = "Error: " . $e->getMessage();
            header("Location: ../machines.php?error=" . urlencode($notDeleted));
        }

        // Fermer les statements
        if (isset($stmt_update_machine)) {
            mysqli_stmt_close($stmt_update_machine);
        }
        if (isset($stmt_delete_machine)) {
            mysqli_stmt_close($stmt_delete_machine);
        }

        // Fermer la connexion
        mysqli_close($conn);
    }
}
?>


