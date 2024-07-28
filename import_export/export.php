<?php
include('../includes/config.php');

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="machines.csv"');

$output = fopen('php://output', 'w');

$query = "SELECT machine_id, marque, compteur, type, debit, garantie, contrat, localisation, cust_id FROM machines";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    $header = array('Numero Serie', 'Marque', 'Compteur', 'Type', 'Débit', 'Garantie', 'Contrat', 'Localisation', 'Customer ID');
    fputcsv($output, $header);

    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
}

fclose($output);
$mysqli->close();
?>
