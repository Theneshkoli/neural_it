$(document).ready(function(){

	// Append Code start here  
	let row_count = 1;
	$('#one_more').on('click',function(){
		row_count = row_count + 1;
		let row_html = '<div id="row'+row_count+'"><small><u>New Address</u></small>';
		row_html += '<div class="form-row my-2"><div class="col">';
		row_html += '<input type="text" name="add_line1[]" class="form-control" placeholder="Address Line 1">';
		row_html += '</div> <div class="col">';
		row_html += '<input type="text" name="add_line2[]" class="form-control" placeholder="Address Line 2">';
		row_html += '</div></div>';
		row_html += '<div class="form-row my-2"><div class="col">';
		row_html += '<select name="state[]" class="custom-select">';
		row_html += '<option selected disabled value="">Choose State</option>';
		row_html += '<option value="Maharashtra">Maharashtra</option>';
		row_html += '<option value="Gujrat">Gujrat</option>';
		row_html += '<option value="Rajasthan">Rajasthan</option>';
		row_html += '<option value="Himachal Pradesh">Himachal Pradesh</option>';
		row_html += '<option value="Andhra Pradesh">Andhra Pradesh</option>';
		row_html += '<option value="Keral">Keral</option>';
		row_html += '<option value="Tamilnadu">Tamilnadu</option>';
		row_html += '<option value="Other">Other</option>';
		row_html += '</select></div><div class="col">';
		row_html += '<select name="country[]" class="custom-select">';
		row_html += '<option selected disabled value="">Choose Country</option>';
		row_html += '<option value="India">India</option>';
		row_html += '<option value="Nepal">Nepal</option>';
		row_html += '<option value="France">France</option>';
		row_html += '<option value="Germany">Germany</option>';
		row_html += '<option value="Rassia">Rassia</option>';
		row_html += '<option value="U.S.A">U.S.A</option>';
		row_html += '</select></div><div class="col">';
		row_html += '<button type="button" class="btn btn-danger btn-block remove_r" data-rem="row'+row_count+'">Remove This Addresses</button>';
		row_html += '</div></div><hr /></div>';

		$('#addr_row').append(row_html); 
	});

	$(document).on('click','.remove_r',function(){
		let row_id = $(this).data("rem");
		$('#' + row_id).remove();
	});
	// Append Code Ends here

	// submit data starts here
	$('.insert_data').on('click',function(){
		let f = $('input[name="fname"]').val();
		let m = $('input[name="mname"]').val();
		let l = $('input[name="lname"]').val();
		let e = $('input[name="email"]').val();
		let p = $('input[name="phone"]').val();
		let g = $('select[name="gender"]').val();
		let d = $('input[name="dob"]').val();
		// let i = $('input[name="image"]').val();
		let s = $('input[name="status"]').val();
		let ao = []; 
		$('input[name="add_line1[]"]').each(function(){
			ao.push(this.value);
		});
		let at = []; 
		$('input[name="add_line2[]"]').each(function(){
			at.push(this.value);
		});
		let st = []; 
		$('select[name="state[]"]').each(function(){
			st.push(this.value);
		});
		let c = []; 
		$('select[name="country[]"]').each(function(){
			c.push(this.value);
		});

		if(f == '' || m == '' || l == '' || e == '' || p == '' || g == '' || d == '' || s == '' || ao == '' || at == '' || st == '' || c == '' ){
			$('small#req').text('All Fields Are Mandatory');
		}else{
			$.ajax({
				url: 'insert.php',
				type: 'POST',
				data: {f:f, m:m, l:l, e:e, p:p, g:g, d:d, s:s, ao:ao, at:at, st:st, c:c},
				//data: {f:f, m:m, l:l, e:e, p:p, g:g, d:d, i:i s:s},
				success: function(result){
					$('#add_emp_here').modal('hide');
					alert(result);
				}
			});
		}
	});
	// submit data ends here

	// fetch data starts here
	function loadData(page){
		$.ajax({
			url : 'get.php',
			type: 'POST',
			data: {page_no:page},
			success: function(response){
				$('#get_data').html(response);
			}
		});
	}
	loadData();
	$(document).on('click','#pagination a',function(e){
		e.preventDefault();			//here, we are preventing href default function pf anchor tag
		let page = $(this).attr('id');

		loadData(page);
	});
	// fetch data ends here 

	$('input[name=search_field]').on('keyup',function(){
			let value = $(this).val(); 

			$.ajax({
				url : 'get.php',
				type: 'POST',
				data : {ser_val:value},
				success: function(result){
					$('#get_data').html(result);
				}
			});
		});
});