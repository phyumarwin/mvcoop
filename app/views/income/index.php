<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="wrapper d-flex align-items-stretch">

	<?php include(APPROOT . '/views/inc/sidebar.php'); ?>

	<!-- Page Content  -->
	<div id="content" class="p-4 p-md-5">

		<?php include(APPROOT . '/views/inc/navbar.php'); ?>

		<h2 class="mb-4">Income</h2>

		<?php include(APPROOT . '/views/components/auth_message.php'); ?>

		<table class="table table-light text-center" id="myTable">
			<thead>
				<tr>
					<th>id</th>
					<th>Category</th>
					<th>Amount</th>
					<th>Assigned By</th>
					<th>Date </th>
					<th></th>
					<th></th>
				</tr>
			</thead>
		</table>
		<a href="<?php echo URLROOT ?>/Income/create" class="btn btn-primary float-right mt-5">Add New</a>
	</div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable').DataTable({
			"ajax": "<?php echo URLROOT ?>/Income/incomeData",
			"columns": [
				{ "data": "id" },
				{ "data": "category_name" },
				{ "data": "amount" },
				{ "data": "user_name" },
				{ "data": "date" },
				{
					mRender: function(data, type, full) {
						//console.log(full);
						return '<a href="<?php echo URLROOT; ?>/Income/edit/' + full.id + '" type="submit"  class = "btn btn-primary edit text-white">Edit</a>';
					}
				},
				{
					mRender: function(data, type, full) {
						// console.log(full);
						return '<button type="submit" value="' + full.id + '" class="btn btn-danger delete">Delete</button>'
					}
				}
			]
		});

		$(document).on('click', '.delete', function() {
			var url_id = $(this).val();
			// alert(url_id);

			var form_url = '<?php echo URLROOT; ?>/Income/destroy/' + url_id;
			// alert(form_url);

			// For Delete
			swal({
					title: "Are you sure?",
					text: "You will not be able to recover this imaginary file!",
					type: "warning",
					showCancelButton: true,
					confirmButtonClass: "btn-danger",
					confirmButtonText: "Yes, Delete",
					cancelButtonText: "Cancel",
					closeOnConfirm: false,
					closeOnCancel: false
				},
				function(isConfirm) {
					if (isConfirm) {
						$.ajax({
							url: form_url,
							type: 'DELETE',
							error: function() {
								alert('Something is wrong');
							},
							success: function(data) {
								$("#" + url_id).remove();
								//   swal("Deleted!", "Your imaginary file has been deleted.", "success");
								window.location.reload();
							}
						});
					} else {
						swal("Cancelled", "Your imaginary file is safe :)", "error");
					}
				});

		});


	});
</script>