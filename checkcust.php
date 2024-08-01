<?php
require_once('session.php');
include 'dbconnect.php';

if (isset($_POST['customer_id'])) {
    $cust_id = $_POST['customer_id'];

    // Préparer la requête pour vérifier l'existence du client
    $stmt = $conn->prepare("SELECT * FROM customers WHERE cust_id = ?");
    $stmt->bind_param("i", $cust_id);
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
