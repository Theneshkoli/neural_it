<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Neural IT Interview Task</title>
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="dist/css/style.css">
	<link rel="stylesheet" href="dist/font-awesome/css/font-awesome.min.css">
</head>
<body>
	<div class="container-fluid mt-3">
		<table class="table table-bordered">
			<tbody>
				<tr>
					<td colspan="2" class="text-center">
						<h4>Neural IT PHP Technical Test - Round 1</h4>
					</td>
				</tr>
				<tr>
					<td>
						<h6>Assigned On : Nov 13 on 16:45 through mail</h6>
					</td>
					<td>
						<h6>Submission Date: Nov 16 before 13:00</h6>
					</td>
				</tr>
				<tr>
					<td>
						<h6>Operation performed - CRUD, searching, Pagination</h6>
					</td>
					<td>
						<h6>Languages Used - HTML, Bootstrap v4.5.3, Jquery, AJAX, Core PHP, MySQL</h6>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="container">
		<div class="row m-2">
			<div class="col-md-6">
				<h5 class="text-secondary">Employee List</h5>
			</div>
			<div class="col-md-4">
				<input type="text" name="search_field" class="form-control" placeholder="Search...">
			</div>
			<div class="col-md-2">
				<button class="btn btn-primary" data-toggle="modal" data-target="#add_emp_here">Add Employee <i class="fa fa-plus"></i></button>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="add_emp_here" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="add_emp" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg  modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="add_emp">Add Employee Details Here</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<form id="form_data" action="" method="POST" enctype="multipart/form-data">
						<div class="modal-body">
							<small id="req" class="text-danger"></small>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label>Name</label>
									</div>
									<div class="col-md-3">
										<input type="text" name="fname" class="form-control"  placeholder="First Name">
									</div>
									<div class="col-md-3">
										<input type="text" name="mname" class="form-control" placeholder="Middle Name">
									</div>
									<div class="col-md-3">
										<input type="text" name="lname" class="form-control" placeholder="Last Name">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label>Email</label>
									</div>
									<div class="col-md-3">
										<input type="email" name="email" class="form-control"  placeholder="enter email address here">
									</div>
									<div class="col-md-3">
										<label>Mobile</label>
									</div>
									<div class="col-md-3">
										<input type="tel" name="phone" class="form-control" placeholder="Mobile Number" pattern="[7|8|9][0-9]{9}">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label>Gender</label>
									</div>
									<div class="col-md-3">
										<select name="gender" class="custom-select">
											<option selected disabled value="">Choose Gender</option>
											<option value="male">Male</option>
											<option value="female">Female</option>
										</select>
									</div>
									<div class="col-md-3">
										<label>Date of Birth</label>
									</div>
									<div class="col-md-3">
										<input type="date" name="dob" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label>Upload Photo</label>
									</div>
									<div class="col-md-6">
										<input name="image" type="file" class="form-control">
									</div>
									<div class="col-md-3">
										<label class="d-block">Status</label>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="status" id="active_stat" value="1">
											<label class="form-check-label" for="active_stat">Active</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="status" id="inactive_stat" value="0">
											<label class="form-check-label" for="inactive_stat">inactive</label>
										</div>
									</div>
								</div>
							</div>
							<small><u>First Address</u></small>
							<div class="form-row my-2">
								<div class="col">
									<input type="text" name="add_line1[]" class="form-control" placeholder="Address Line 1">
								</div>
								<div class="col">
									<input type="text" name="add_line2[]" class="form-control" placeholder="Address Line 2">
								</div>
							</div>
							<div class="form-row my-2">
								<div class="col">
									<select name="state[]" class="custom-select">
										<option selected disabled value="">Choose State</option>
										<option value="Maharashtra">Maharashtra</option>
										<option value="Gujrat">Gujrat</option>
										<option value="Rajasthan">Rajasthan</option>
										<option value="Himachal Pradesh">Himachal Pradesh</option>
										<option value="Andhra Pradesh">Andhra Pradesh</option>
										<option value="Keral">Keral</option>
										<option value="Tamilnadu">Tamilnadu</option>
										<option value="Other">Other</option>
									</select>
								</div>
								<div class="col">
									<select name="country[]" class="custom-select">
										<option selected disabled value="">Choose Country</option>
										<option value="India">India</option>
										<option value="Nepal">Nepal</option>
										<option value="France">France</option>
										<option value="Germany">Germany</option>
										<option value="Rassia">Rassia</option>
										<option value="U.S.A">U.S.A</option>
									</select>
								</div>
								<div class="col">
									<button class="btn btn-success btn-block" id="one_more" type="button">Add More Addresses</button>
								</div>
							</div>
							<hr />
							<div id="addr_row"></div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary insert_data">Add Now</button>
						</div>
					</form>
				</div>
			</div>
		</div>	

		<div id="get_data"></div>

	</div>

	<script src="dist/js/jquery.js"></script>
	<script src="dist/js/bootstrap.bundle.min.js"></script>
	<script src="dist/js/main.js"></script>

</body>
</html>