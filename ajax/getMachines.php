<?php
include('../includes/config.php');
$edit='';
$query = "SELECT m.machine_id, m.compteur, m.type, m.localisation, m.cust_id FROM machines m ";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $arr[] = $row;
    }
}

# JSON-encode the response
$json_response = json_encode($arr);

// # Return the response
echo $json_response;

