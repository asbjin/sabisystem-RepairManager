<?php
include 'dbconnect.php';
session_start(); // Démarrage de la session

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['login_user'])) {
    // Si l'utilisateur n'est pas connecté, fermer la connexion et rediriger vers la page d'accueil
    mysqli_close($conn); // Fermeture de la connexion
    header('Location: index.php'); // Redirection vers la page d'accueil
    exit(); // Assurez-vous de ne pas exécuter le code suivant
}

// Stocker la session
$user_check = $_SESSION['login_user'];

// Requête SQL pour récupérer les informations complètes de l'utilisateur
$query = "SELECT * FROM staff WHERE username='$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);

// Vérifiez si l'utilisateur existe dans la base de données
if ($row) {
    $login_session = $row['username'];
    $login_id = $row['staff_id'];
} else {
    // Si l'utilisateur n'existe pas, fermer la connexion et rediriger vers la page d'accueil
    mysqli_close($conn);
    header('Location: index.php');
    exit();
}
?>
