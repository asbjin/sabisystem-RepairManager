<?php
	include('../includes/config.php');
	$edit = '';
	$query = "SELECT DISTINCT 
        r.rep_ID AS rep_id,
        c.nom_entreprise AS nom_entreprise, 
        s.surname AS nom_staff, 
        s.forename AS prenom_staff, 
        r.contrat AS contrat,
        r.facturer AS facture,
        r.description_P AS description_P,
        r.description_R AS description_R,
        r.changed_pieces AS changed_pieces,
        r.recommended_pieces AS recommended_pieces,
        r.repairDate AS repairdate, 
        r.collectionDate AS collectiondate, 
        r.status AS status
    FROM 
        repairs r
    JOIN 
        staff s ON r.Staff_ID = s.staff_id
    JOIN 
        customers c ON r.Cust_ID = c.cust_id
    WHERE 
        r.Status != 'Invoiced'
    ORDER BY 
        r.Cust_ID DESC;
";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	
	$arr = array();
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$arr[] = $row;	  
		}
	}
	// JSON-encode the response
	$json_response = json_encode($arr);
	
	// Return the response
	echo $json_response;
?>
