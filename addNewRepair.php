<?php
$success = '';
$notFound = '';

if (isset($_POST['submit'])) {
    $cust_id = $_POST['cust_id'];
    $staff_id = $_POST['staff_id'];
    $contrat = $_POST['contrat'];
    $facturer = $_POST['facturer'];
    $description_P = $_POST['description_P'];
    $description_R = $_POST['description_R'];
    $changed_pieces = $_POST['changed_pieces'];
    $recommended_pieces = $_POST['recommended_pieces'];
    $status = $_POST['status'];

    include 'dbconnect.php';

    // To protect MySQL injection for Security purpose
    $cust_id = stripslashes($cust_id);
    $staff_id = stripslashes($staff_id);
    $contrat = stripslashes($contrat);
    $facturer = stripslashes($facturer);
    $description_P = stripslashes($description_P);
    $description_R = stripslashes($description_R);
    $changed_pieces = stripslashes($changed_pieces);
    $recommended_pieces = stripslashes($recommended_pieces);
    $status = stripslashes($status);

    $cust_id = mysqli_real_escape_string($conn, $cust_id);
    $staff_id = mysqli_real_escape_string($conn, $staff_id);
    $contrat = mysqli_real_escape_string($conn, $contrat);
    $facturer = mysqli_real_escape_string($conn, $facturer);
    $description_P = mysqli_real_escape_string($conn, $description_P);
    $description_R = mysqli_real_escape_string($conn, $description_R);
    $changed_pieces = mysqli_real_escape_string($conn, $changed_pieces);
    $recommended_pieces = mysqli_real_escape_string($conn, $recommended_pieces);
    $status = mysqli_real_escape_string($conn, $status);

    if (is_numeric($cust_id)) {
        $query = "SELECT * FROM repairs";
        $valid = mysqli_query($conn, $query);

        if (!$valid) {
            $notFound = "Could not connect to the database!<br><br>";
        }

        $sql = "INSERT INTO repairs (cust_id, staff_id, contrat, facturer, description_P, description_R, changed_pieces, recommended_pieces, status)
                VALUES ('$cust_id', '$staff_id', '$contrat', '$facturer', '$description_P', '$description_R', '$changed_pieces', '$recommended_pieces', '$status');";
        
        $res = mysqli_query($conn, $sql);

        if (!$res) {
            $notFound = "Error adding...<br><br>";
        }

        if (mysqli_affected_rows($conn) == 1) {
            $success = "Repair added successfully. Redirecting.....<br><br>";
            $id = $cust_id;
            header("refresh:3; url=addRepair.php");
        } else {
            $notFound = "Could not add due to system error!<br><br>";
        }
    } else {
        $id = $cust_id;
        $notFound = "Customer wasn't found in the system. Please go back and enter a valid customer ID <br><br>";
    }

    mysqli_close($conn);
}
?>
