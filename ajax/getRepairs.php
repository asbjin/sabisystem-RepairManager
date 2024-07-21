<?php
	include('../includes/config.php');
	$edit = '';
	$query="SELECT DISTINCT 
	r.rep_id,
    c.nom_entreprise AS nom_entreprise, 
    s.surname AS nom_staff, 
    s.forename AS prenom_staff, 
    r.description,  
    r.model, 
    r.repairdate, 
    r.collectiondate, 
    r.status 
FROM 
    repairs r
JOIN 
    staff s ON r.staff_id = s.staff_id
JOIN 
    customers c ON r.cust_id = c.cust_id
WHERE 
    r.status != 'Invoiced'
ORDER BY 
    r.cust_id DESC;
";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	
	$arr = array();
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$arr[] = $row;	  
		}
	}
	# JSON-encode the response
	$json_response = json_encode($arr);
	
	// # Return the response
	echo $json_response;
?>
