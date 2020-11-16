<?php 

	require('db.php');

	$ch_mail = mysqli_query($conn, "SELECT DISTINCT mail from employee");

	if (mysqli_num_rows($ch_mail) > 0){
		while( $chh = mysqli_fetch_assoc($ch_mail)){
			foreach($chh as $ch){
				if($ch == $_POST['e']){
					echo "Email Must be unique";
					return;
				}
				else{
					$e = $_POST['e'];
				} 
			}
		}
	}

	$f = $_POST['f'];
	$m = $_POST['m'];
	$l = $_POST['l'];
	$g = $_POST['g'];
	$p = $_POST['p'];
	$d = $_POST['d'];
	$i = "dummy.png";
	$s = $_POST['s'];
	$ao= $_POST['ao'];
	$at= $_POST['at'];
	$st= $_POST['st'];
	$c = $_POST['c'];

	$sql = "INSERT INTO employee (fname, mname, lname, gender, mail, mobile_no, date_of_birth, photograph, status) VALUES('$f', '$m', '$l', '$g', '$e', '$p', '$d', '$i', '$s') ";

	if(mysqli_query($conn, $sql)){
		$last_id = mysqli_insert_id($conn);
		if(mysqli_affected_rows($conn)>0){
			for($z = 0; $z < count($ao); $z++){
				$sql1 = "INSERT INTO address (employee_id, add_line1, add_line2, state, country) VALUES('$last_id','$ao[$z]','$at[$z]', '$st[$z]', '$c[$z]')";
				if(mysqli_query($conn, $sql1)){
					echo 'successfully address Inserted';
				}
				else{
					echo 'Address Insertion failed';
					return;
				}
				
			}
		}
		echo 1;
	}
	else{
		echo 0;
	}

?>