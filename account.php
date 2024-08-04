<?php
	require_once('session.php');
	require('addNewStaff.php'); 
?>

<!DOCTYPE html>
<html ng-app="myApp" ng-app lang="en">
	<head>
		<title>PC Solutions - Account</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta charset="utf-8">
		<meta name="description" content="Lakeside Books">
		<meta name="keywords" content="books, lakeside, cork, shop, online">
		
		<link rel="shortcut icon" href="favicon.ico"> 
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/global.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
		<link rel="stylesheet" href="css/menu.css" />
		<script src="js/modernizr.custom.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
			ul>li, a{cursor: pointer;}
		</style>
		
		<style>@import url(http://fonts.googleapis.com/css?family=Raleway:400,700); </style>
		
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
		
	</head>
	
	<body id="top" style="font-size: 62.5%;">
	<?php
		include_once('includes/header.php');
		?>
			
			<!--Breadcrumb -->
			<div class="bread">
				<div class="submenu">
					<ul>
						<li id="back" value="Update Inventory">Update Account Details</li>
					</ul>
				</div>
				<h3>Account</h3>
			</div>
			<!--Breadcrumb -->
			
			
			<div class="floats">
				<div class=" full-widget">
					<?php
						$staff = '';
						include 'dbconnect.php';
						
						$query = "SELECT * FROM staff WHERE staff_id = $login_id";
						
						$result= mysqli_query($conn, $query);
						
						if (!$result) {
							$error = "Could not connect to the database!";
						}
						
						if(mysqli_num_rows($result) == 0) {
							$error = "<ul> <li>Sorry, your search query (\"" .$name ."\") did not find any results!</li></ul>";
						}
						//-create  while loop and loop through result set
						while($row = mysqli_fetch_array($result)){
							$ID = $row['staff_id'];
							$firstname  =$row['forename'];
							$lastname=$row['surname'];
							$town = $row['town'];
							$county = $row['county'];
							$tel = $row ['tel'];
							
							//-display the result of the array
							$staff = "<ul><h1><li>" .$firstname . " " . $lastname .  "</li><li> "   .$town . "</li><li> "   .$county . "</li><li> "   .$tel . "</li></h1></ul>";
							echo $staff;
						}
						mysqli_close($conn);

				?>

		<div class="container">
					<div class="rect reg">
						<form class="form-4" method="POST" action="">
							
								<h3>Register</h3>
								<span id="error"><?php echo $error; ?></span>
								<span id="error"><?php echo $success; ?></span>
								<label for="surname">surname</label>
								<input type="text" name="surname" placeholder="Surname" required>
								
								<label for="forename">forename</label>
								<input type="text" name="forename" placeholder="Forename" required>
								
								<label for="email">email</label>
								<input type="text" name="email" placeholder="Email" required>
								
								<label for="town">town</label>
								<input type="text" name="town" placeholder="Town">
								
								<label for="county">county</label>
								<input type="text" name="county" placeholder="County">
								
								<label for="telephone">telephone</label>
								<input type="text" name="telephone" placeholder="Telephone/Mobile">
								
								<label for="login">username</label>
								<input type="text" name="username" placeholder="Username" required>
							
								<label for="password">password</label>
								<input type="password" name="password" placeholder="Password" required> 

								<input type="submit" name="submit" value="Register">
								
						</form>
						
					</div>
				</div>
				
			</div> 
			<!-- END OF FULL WIDGET-->
		</div> 
		<!-- END OF FLOATS-->
	</div>
	<!-- END OF MAIN-->
	
	<!-- SCRIPT FOR THE MENU -->
	<script src="js/menu.js"></script>
	<!-- SCRIPT FOR THE MENU --> 
	
</body>

</html>