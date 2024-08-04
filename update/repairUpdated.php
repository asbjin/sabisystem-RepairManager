<?php
    // Connect to the database server
    $success = '';
    $error = '';

    if (isset($_POST['submit'])) {
        
        include 'dbconnect.php';
        if (mysqli_connect_errno()) {
            $error = "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        $rep_id = $_POST['rep_id'];
        $cust_id = $_POST['cust_id'];
        $machine_id = $_POST['machine_id'];
        $contrat = $_POST['contrat'];
        $facturer = $_POST['facturer'];
        $description_P = $_POST['description_P'];
        $description_R = $_POST['description_R'];
        $changed_pieces = $_POST['changed_pieces'];
        $recommended_pieces = $_POST['recommended_pieces'];
		$status = $_POST['status'];

        $sql = "UPDATE repairs SET cust_id = '$cust_id', machine_id = '$machine_id', contrat = '$contrat', facturer = '$facturer', description_P = '$description_P', description_R = '$description_R', changed_pieces = '$changed_pieces', recommended_pieces = '$recommended_pieces', status = '$status' WHERE rep_id = $rep_id";

        $res = mysqli_query($conn, $sql);
        if (!$res) {
            $error = 'Query failed ' . $sql . ' Error:' . mysqli_error($conn);
            exit();
        } else {
            if (mysqli_affected_rows($conn) < 1) {
                $error = "<br><br><p><em>You have not amended anything! Redirecting....</em></p>";
                header("refresh:2; url=repairs.php");
            } else {
                $success = "<br><p><em>Repair details have been updated successfully! Redirecting....</em></p>";
                header("refresh:2; url=repairs.php");
            }

            }
            // Free results
            mysqli_free_result($res);
            
            // Close the connection
            mysqli_close($conn);
        }
    
?> 
