<?php


// Vérifie si un ID de réparation est envoyé et s'il est numérique
if (isset($_POST['go'])) {
    
    include 'dbconnect.php';

    // Vérifie la connexion à la base de données
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
	
    // Récupère l'ID de réparation envoyé par le formulaire
    $id = $_POST['rep_update'];

    // Requête SQL pour récupérer les détails de la réparation
    $sql = "SELECT * FROM repairs WHERE rep_id = $id";
   
    // Exécute la requête SQL
    $res = mysqli_query($conn, $sql);

    // Vérifie si la requête a réussi
    if (!$res) {
        echo 'Query failed: ' . $sql . ' Error: ' . mysqli_error($conn);
        exit();
    } else {
        // Récupère les résultats de la requête
        $row = mysqli_fetch_array($res); 
        $cust_id = $row['cust_id'];
        $machine_id = $row['machine_id'];
        $contrat = $row['contrat'];
        $facturer = $row['facturer'];
        $description_P = $row['description_P'];
        $description_R = $row['description_R'];
        $changed_pieces = $row['changed_pieces'];
        $recommended_pieces = $row['recommended_pieces'];
        $repairDate = $row['repairDate'];
        $collectionDate = $row['collectionDate'];
        $status = $row['Status'];
    }

    // Libère les résultats
    mysqli_free_result($res);

    // Ferme la connexion
    mysqli_close($conn);
}
?>
