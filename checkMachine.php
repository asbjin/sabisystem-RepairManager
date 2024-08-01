<?php
require_once('session.php');
include 'dbconnect.php';

if (isset($_POST['machine_id'])) {
    $machine_id = $_POST['machine_id'];

    // Préparer la requête pour vérifier l'existence de la machine
    $stmt = $conn->prepare("SELECT * FROM machines WHERE machine_id = ?");
    $stmt->bind_param("s", $machine_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Préparer la réponse JSON
    $response = array();
    if ($result->num_rows > 0) {
        $response['exists'] = true;
    } else {
        $response['exists'] = false;
    }

    echo json_encode($response);

    $stmt->close();
    mysqli_close($conn);
}
?>
