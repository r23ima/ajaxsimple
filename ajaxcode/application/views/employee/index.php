<h2>Employee Table</h2>
<button class="btn btn-primary btn-lg" id="btnAdd">Add Employee</button>
<br/><br/>
<div class="alert ">
	
</div>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Address</th>
			<th>Mobile No.</th>
			<th>Email</th>
			<th>Date Created</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody id="showdata">
		
	</tbody>
</table>

<nav aria-label="Page navigation example">
  <ul class="pagination" id="pg">
   
  </ul>
</nav>

<div id="myModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	<form method="POST" id="myForm">
       		<div class="form-group">
			    <label>Name<b class="text-danger">*</b></label>
			    <input type="text" name="emp_name" class="form-control" placeholder="ex. John Doe">
			    <div class="invalid-feedback">Name is required.</div>
			</div>
			<div class="form-group">
			    <label>Address<b class="text-danger">*</b></label>
			   	<textarea class="form-control" name="emp_addr"></textarea>
			   	<div class="invalid-feedback">Address is required.</div>
			</div>
			<div class="form-group">
			    <label>Mobile No.<b class="text-danger">*</b></label>
			    <input type="text" name="emp_mobile" class="form-control" placeholder="ex. 09xxx">
			    <div class="invalid-feedback">Mobile Number is required.</div>
			</div>
       		<div class="form-group">
			    <label>Email address<b class="text-danger">*</b></label>
			    <input type="email" name="emp_email" class="form-control" placeholder="ex. jonhdoe@gmail.com">
			    <div class="invalid-feedback">Email is required.</div>
			</div>
       	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnProceed">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
	$(function(){
		var currentpage, nextpage, previouspage;
		var limit = 3;
		var rows;
		getAllRows();
		showAllEmployee(limit);
		
		function paginateView(){
			alert(rows);
			var division = Math.ceil(rows / limit);
			var pg = '';
			for(var i=1; i<=division; i++){
				pg += "<li class='page-item'><a class='page-link' href=''>"+i+"</a></li>";
			}

			$('#pg').html(pg);
		}

		$('#btnAdd').click(function(){
			$('#myModal').modal('show');
			$('#myModal').find('.modal-header').text("Add Employee");
			$('#myForm').attr('action', '<?php echo base_url(); ?>employee/add');
		});

		//add employee
		$('#btnProceed').click(function(){
			var url = $('#myForm').attr('action');
			var data = $('#myForm').serialize();

			//validation
			var emp_name = $('#myForm').find('input[name=emp_name]').val();
			var emp_addr = $('#myForm').find('textarea[name=emp_addr]').val();
			var emp_mobile = $('#myForm').find('input[name=emp_mobile]').val();
			var emp_email = $('#myForm').find('input[name=emp_email]').val();
		
			if(emp_name=='' || emp_addr=='' || emp_mobile=='' || emp_email==''){
				if(emp_name==''){
					$('#myForm').find('input[name=emp_name]').addClass('is-invalid');
				}
				if(emp_addr==''){
					$('#myForm').find('textarea[name=emp_addr]').addClass('is-invalid');
				}
				if(emp_mobile==''){
					$('#myForm').find('input[name=emp_mobile]').addClass('is-invalid');
				}
				if(emp_email==''){
					$('#myForm').find('input[name=emp_email]').addClass('is-invalid');
				}
			}
			else{
				$('#myForm').find('input[name=emp_name]').removeClass('is-invalid');
				$('#myForm').find('textarea[name=emp_addr]').removeClass('is-invalid');
				$('#myForm').find('input[name=emp_mobile]').removeClass('is-invalid');
				$('#myForm').find('input[name=emp_email]').removeClass('is-invalid');

				$.ajax({
					type: 'ajax',
					url: url,
					async: false,
					data: data,
					type:'POST',
					dataType:'json',
					success: function(response){
						$('#myModal').modal('hide');
						$('#myForm')[0].reset();
						showAllEmployee();
						if(response.type=='200'){
							$('.alert').html(response.msg).addClass('alert-success').fadeIn().delay(4000).fadeOut('slow');
						}
						else if(response.type=='500'){
							$('.alert').html(response.msg).addClass('alert-danger').fadeIn().delay(4000).fadeOut('slow');
						}
					},
					error: function(){
					
					}
				});
			}
		});

		//edit employee
		$('#showdata').on('click', '.item-edit', function(){
			var id = $(this).attr('data');
			$('#myModal').modal('show');
			$('#myModal').find('.modal-header').text("Edit Employee");
			$('#myForm').attr('action', '<?php echo base_url(); ?>employee/edit');
			
			$.ajax({
				type: 'ajax',
				method: 'GET',
				url: '<?php echo base_url(); ?>employee/viewEmployee',
				async: false,
				dataType: 'json',
				data: {id: id},
				success: function(data){
					$('#myForm').find('input[name=emp_name]').val(data.emp_name);
					$('#myForm').find('textarea[name=emp_addr]').val(data.emp_address);
					$('#myForm').find('input[name=emp_mobile]').val(data.emp_number);
					$('#myForm').find('input[name=emp_email]').val(data.emp_email);

					$('<input>').attr({
					    type: 'hidden',
					    value: id,
					    name: 'emp_id'
					}).appendTo('#myForm');
				},
				error: function(){

				}
			});
		});

		//delete employee
		$('#showdata').on('click', '.item-delete', function(){
			var id = $(this).attr('data');

			$.ajax({
				type: 'ajax',
				async: false,
				method: 'GET',
				dataType: 'json',
				data: {id: id},
				url: '<?php echo base_url(); ?>employee/delete',
				success: function(response){
					if(response.type=='200'){
						$('.alert').addClass('alert-success');
					}
					else if(response.type=='500'){
						$('.alert').addClass('alert-danger');
					}
					$('.alert').html(response.msg).fadeIn().delay(4000).fadeOut('slow');
					showAllEmployee();
				},
				error: function(){

				}
			});
		});

		function showAllEmployee(limit){
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url('employee/showAllEmployee'); ?>',
				async: false,
				method: 'GET',
				data: {limit: limit},
				dataType: 'json',
				success: function(data){
					var html = '';	
					data.forEach(function(d){
						html += 
							"<tr>"+
								"<td>"+d.emp_name+"</td>"+
								"<td>"+d.emp_address+"</td>"+
								"<td>"+d.emp_number+"</td>"+
								"<td>"+d.emp_email+"</td>"+
								"<td>"+d.emp_datecreated+"</td>"+
								"<td class='text-center'>"+
									"<button class='mr-2 btn btn-lg btn-success item-edit' data='"+d.emp_id+"'>EDIT</button>"+
									"<button class='mr-2 btn btn-lg btn-danger item-delete' data='"+d.emp_id+"'>DELETE</button>"+
								"</td>"+
							"<tr>";
					});

					$('#showdata').html(html);
					paginateView(data.length);
				},
				error: function(){
					alert("Could not get data from database");
				}
			});
		}

	
	});
</script>