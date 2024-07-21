<?php
	$success = '';
	$error =  '';
	if (isset($_POST['submit'])) {
		// Define $username and $password
		$nom_entreprise = $_POST['nom_entreprise'];
		$adresse = $_POST['adresse'];
		$number_register = $_POST['number_register'];
		$nom_contact = $_POST['nom_contact'];
		$tel = $_POST['tel'];
		
		
		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		include 'dbconnect.php';
		
		// To protect MySQL injection for Security purpose
		$nom_entreprise = stripslashes($nom_entreprise );
		$adresse = stripslashes($adresse);
		$number_register = stripslashes($number_register);
		$nom_contact = stripslashes($nom_contact);
		$tel = stripslashes($tel);
		
		$nom_entreprise = mysqli_real_escape_string($conn, $nom_entreprise );
		$adresse = mysqli_real_escape_string($conn, $adresse);
		$number_register = mysqli_real_escape_string($conn, $number_register);
		$nom_contact = mysqli_real_escape_string($conn, $nom_contact);
		$tel = mysqli_real_escape_string($conn, $tel);
		
		
		if ( is_numeric($tel) ) {
			$query = "SELECT * FROM customers WHERE tel = '$tel'";
			$valid = mysqli_query($conn, $query);
			
			if (!$valid) {
				$error = "Could not connect to the database!";
			}
			
			if (mysqli_num_rows($valid) == 0 ) {
				$sql = "INSERT INTO customers (nom_entreprise, adresse, number_register, nom_contact, tel)
				VALUES ('$nom_entreprise', '$adresse', '$number_register', '$nom_contact', '$tel');";
				$res = mysqli_query($conn, $sql);
				
				if (!$res) {
					$error = "Error registering....";
				}
				
				if (mysqli_affected_rows($conn) == 1) {
					$success =  "Customer created successfully. Redirecting.....";
					header("refresh:2; url=customer.php");
					
					} else {
					$error =  ("Could not register due to system error!");
				}
				
				} else {
				$error = "The customer already exist in the system.";
			}
			
			} else {
			$error = "tel number should numeric!";
		}
		
		mysqli_close($conn);
	}
?>