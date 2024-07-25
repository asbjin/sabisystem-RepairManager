<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$deleted = '';
$notDeleted = '';

// Include the database connection file
include '../dbconnect.php';

if (isset($_POST['delete'])) {
    $machine_id = $_POST['machine_id'];

    if ($machine_id == '') {
        $notDeleted = "You did not complete the delete form correctly.";
        header("Location: ../machines.php?error=" . urlencode($notDeleted));
        exit();
    } else {
        // Start a transaction
        mysqli_begin_transaction($conn);

        try {
            // Check if the machine exists
            $sql_check_machine = "SELECT * FROM machines WHERE machine_id = ?";
            $stmt_check_machine = mysqli_prepare($conn, $sql_check_machine);

            if (!$stmt_check_machine) {
                throw new Exception("Failed to prepare select statement: " . mysqli_error($conn));
            }

            mysqli_stmt_bind_param($stmt_check_machine, "s", $machine_id);
            mysqli_stmt_execute($stmt_check_machine);
            mysqli_stmt_store_result($stmt_check_machine);

            if (mysqli_stmt_num_rows($stmt_check_machine) > 0) {
                // Machine exists, proceed to delete
                $sql_delete_machine = "DELETE FROM machines WHERE machine_id = ?";
                $stmt_delete_machine = mysqli_prepare($conn, $sql_delete_machine);

                if (!$stmt_delete_machine) {
                    throw new Exception("Failed to prepare delete statement: " . mysqli_error($conn));
                }

                mysqli_stmt_bind_param($stmt_delete_machine, "s", $machine_id);
                mysqli_stmt_execute($stmt_delete_machine);

                // Commit the transaction
                mysqli_commit($conn);

                $deleted = "Machine no. " . $machine_id . " has been deleted successfully.";
                header("Location: ../machines.php?success=" . urlencode($deleted));
            } else {
                // Machine does not exist
                $notDeleted = "Machine no. " . $machine_id . " does not exist.";
                header("Location: ../machines.php?error=" . urlencode($notDeleted));
            }
        } catch (Exception $e) {
            // Rollback the transaction in case of error
            mysqli_rollback($conn);
            $notDeleted = "Error: " . $e->getMessage();
            header("Location: ../machines.php?error=" . urlencode($notDeleted));
        }

        // Close the statements
        if (isset($stmt_check_machine)) {
            mysqli_stmt_close($stmt_check_machine);
        }
        if (isset($stmt_delete_machine)) {
            mysqli_stmt_close($stmt_delete_machine);
        }

        // Close the connection
        mysqli_close($conn);
    }
}
?>
