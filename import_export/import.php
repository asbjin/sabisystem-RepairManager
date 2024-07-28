<?php
include('../includes/config.php');

if ($_FILES['file']['error'] == UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];

        if (($file = fopen($fileTmpPath, 'r')) !== FALSE) {
            fgetcsv($file); // Skip the header

            while (($data = fgetcsv($file)) !== FALSE) {
                $query = "INSERT INTO machines (machine_id, marque, compteur, type, debit, garantie, contrat, localisation, cust_id)
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt = $mysqli->prepare($query);
                $stmt->bind_param('ssiisssss', $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8]);
                $stmt->execute();
            }

            fclose($file);
            echo "Données importées avec succès.";
        } else {
            echo "Erreur lors de l'ouverture du fichier.";
        }
    
    
} else {
    echo "Erreur de téléchargement du fichier.";
}

$mysqli->close();
?>
