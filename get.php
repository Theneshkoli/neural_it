<?php 

	require('db.php');

	$limit_per_page = 1;
	$page = '';
	if(isset($_POST['page_no'])){
		$page = $_POST['page_no'];
	}
	else{
		$page = 1;
	}

	$offset = ($page - 1) * $limit_per_page;

	if(isset($_POST['ser_val'])){
		$search_v = $_POST['ser_val'];

		$sql = "SELECT * from employee WHERE fname LIKE '%$search_v%' OR lname LIKE '%$search_v%' OR mobile_no LIKE '%$search_v%' LIMIT ".$offset.",".$limit_per_page."";
	}
	else{
		$sql = "SELECT * from employee LIMIT ".$offset.",".$limit_per_page."";
	}

	// $sql = "SELECT * FROM `employee` INNER JOIN `address` ON employee.eid = address.employee_id ";

	$result = mysqli_query($conn, $sql) or die("SQL Failed");

	$output = '';

	$output = '<table class="table table-responsive table-bordered table-striped">
						<thead>
							<th>#</th>
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Last Name</th>
							<th>Gender</th>
							<th>E-Mail ID</th>
							<th>Mobile</th>
							<th>DOB</th>
							<th>Photo</th>
							<th>Status</th>
							<th>Edit/ Delete</th>
						</thead>
						<tbody>';

	if (mysqli_num_rows($result) > 0){
		$i = 1;

		while( $row = mysqli_fetch_assoc($result)){
			$output .= '<tr>
							<td>'.$i++.'</td>
							<td>'.$row['fname'].'</td>
							<td>'.$row['mname'].'</td>
							<td>'.$row['lname'].'</td>
							<td>'.$row['gender'].'</td>
							<td>'.$row['mail'].'</td>
							<td>'.$row['mobile_no'].'</td>
							<td>'.$row['date_of_birth'].'</td>
							<td><img src="uploads/dummy.png" alt="" height="45" width="45"></td>';

							if($row['status'] == 1){
								$output .= '<td><span class="status active"></span></td>';
							}
							else if($row['status'] == 0){
								$output .= '<td><span class="status inactive"></span></td>';
							}

				

				$output .= '<td>
								<button class="btn btn-secondary d-inline" data-id='.$row['eid'].'>
									<i class="fa fa-edit"></i>
								</button>
								<button class="btn btn-danger d-inline" data-id='.$row['eid'].'>
									<i class="fa fa-trash"></i>
								</button>
							</td>
						</tr>';
		}
		$output .= '</tbody>
					</table>';

		$sql_num_rows = 'SELECT eid FROM employee';
		$result_rows  = mysqli_query($conn,$sql_num_rows)or die('total rows not counted');
		$total_records = mysqli_num_rows($result_rows);
		$total_pages = ceil($total_records/$limit_per_page) ;
		
		$output .= '<nav id="pagination" aria-label="list-employee">
								<ul class="pagination justify-content-center">';
			for($j=1; $j <= $total_pages ; $j++ ){

				if($j == $page){
					$output .= '<li class="page-item active"><a id="'.$j.'" class="page-link" href="#">'.$j.'</a></li>'; 
				}
				else{
					$output .= '<li class="page-item"><a id="'.$j.'" class="page-link" href="#">'.$j.'</a></li>'; 
				}
				
			}

		$output .= '</ul></nav>';

		echo $output;
	}
	else{
		echo $output .= '<tr><td colspan="11">No Data Inserted</td></tr></tbody></table>';
	}

?>