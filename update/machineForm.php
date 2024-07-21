<?php
require_once 'config.php'; // Inclure le fichier de configuration de la base de données

if (isset($_POST['record']) && is_numeric($_POST['record'])) {
    $cid = $_POST['record'];

    // Préparer la requête SQL avec une requête préparée pour éviter les injections SQL
    $sql = "SELECT * FROM customers WHERE cust_id=?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt === false) {
        die('Erreur de préparation de la requête SQL: ' . $mysqli->error);
    }

    // Binder le paramètre et exécuter la requête
    $stmt->bind_param("i", $cid);
    $stmt->execute();

    // Obtenir le résultat de la requête
    $result = $stmt->get_result();

    if (!$result) {
        die('Erreur d\'exécution de la requête SQL: ' . $stmt->error);
    } else {
        // Récupérer la ligne de résultat comme un tableau associatif
        $row = $result->fetch_assoc();
        
        // Vérifier si on a obtenu des résultats
        if ($row) {
            $id = $row['cust_id'];
            $surname = $row['surname'];
            $forename = $row['forename'];
            $town = $row['town'];
            $county = $row['county'];
            $tel = $row['tel'];
        } else {
            echo "Aucun client trouvé avec l'ID: $cid";
        }
    }

    // Fermer le statement et la connexion
    $stmt->close();
    $mysqli->close();
} else {
    echo "ID de client non valide.";
}
?>
