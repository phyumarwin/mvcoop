<?php require_once APPROOT . '/views/inc/header.php'; ?>
<div class="wrapper d-flex align-items-stretch">
    <?php require_once APPROOT . '/views/inc/sidebar.php'; ?>
    <div id="content" class="p-4 p-md-5">
        <?php require_once APPROOT . '/views/inc/navbar.php'; ?>
        <div class="container">
        <h1 class="ml-0 my-5">Expense</h1>
		<?php require APPROOT . '/views/components/auth_message.php'; ?>
		  
            <table id="expenseTable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category</th>
						<th>Amount</th>
                        <th>Quantity</th>
                        <th>Assigned By</th>
                        <th>Date</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

            </table>
        </div>    
        <button type="submit" class="btn btn-warning float-right px-5"><a href="<?php echo URLROOT; ?>/expense/create">Add New</a></button>
    </div>

</div>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>

<script type="text/javascript">
	$(document).ready(function () {
		$('#expenseTable').DataTable({
			"ajax" : "<?php echo URLROOT; ?>/expense/expenseData",
			"columns" : [
				{ "data" : "id" },
				{ "data" : "category_name" },
				{ "data" : "amount" },
				{ "data" : "qty" },
				{ "data" : "user_name" },
				{ "data" : "date" },
				{
					mRender : function (data, type, full) {
						// console.log(full);
						return '<a href="<?php echo URLROOT; ?>/expense/edit/' + full.id + '" type="submit" class="btn btn-primary">Edit</a>'
					}
				},
				{
					mRender : function (data, type, full) {
						// console.log(full);
						return '<button type="submit" value="' + full.id + '" class="btn btn-danger delete">Delete</button>'
					}
				}
			]
		});

		$(document).on('click', '.delete', function () {
			
			var url_id = $(this).val();
			// alert(url_id);

			var form_url = '<?php echo URLROOT; ?>/expense/destroy/' + url_id;
			// alert(form_url);

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
    	              $("#"+url_id).remove();
    	            //   swal("Deleted!", "Your imaginary file has been deleted.", "success");
					  window.location.reload();
    	         }
    	      });
    	    } else {
    	      swal("Cancelled", "Your imaginary file is safe :)", "error");
    	    }
    	  });

			// $.ajax({
			// 	url : form_url,
			// 	type : 'POST',
			// 	data : {
			// 		id : url_id
			// 	},
			// 	success: function () {
			// 		window.location.reload();
            //     }
			// });
			
		});
	});
</script>
