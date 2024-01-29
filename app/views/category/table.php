<?php require_once APPROOT . '/views/inc/header.php'; ?>
<div class="wrapper d-flex align-items-stretch">
    <?php require_once APPROOT . '/views/inc/sidebar.php'; ?>
    <div id="content" class="p-4 p-md-5">
        <?php require_once APPROOT . '/views/inc/navbar.php'; ?>
        <div class="container">
        <h1 class="ml-0 my-5">Category</h1>
          
		<?php require APPROOT . '/views/components/auth_message.php'; ?>
		
        <div class="row">
            <div class="input-group mb-3 col-lg-6">
                <label for="">Show
                    <select class="custom-select" id="inputGroupSelect02" style="width: 50%;">
                      <option selected>Choose...</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                    Entries
                </label>
            </div>
              <label for="" class="d-flex" style="margin-left: 100px;">
                  Search: <input class="form-control form-control-sm ml-2 " type="text">
              </label>
        </div>
            
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
						<th>Description</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['categories'] as $category) { ?>
					<tr>
						<td><?php echo $category['id']; ?></td>
						<td><?php echo $category['name']; ?></td>
						<td><?php echo $category['description']; ?></td>
						<td><?php echo $category['type_name']; ?></td>
						<td>
							<!-- Edit Row -->
							<a href="<?php echo URLROOT; ?>/category/edit/<?php echo $category['id']; ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<!-- Delete Row -->
							<a href="#deleteEmployeeModal" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
					<?php } ?>
                </tbody>
            </table>
			
        </div>    
        <button type="submit" class="btn btn-warning float-right px-5"><a href="<?php echo URLROOT; ?>/category/create">Add New</a></button>
    </div>
	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!-- Delete Modal HTML -->

<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo URLROOT; ?>/Category/destroy ?>" method="POST">
                <div class="modal-header">                        
                    <h4 class="modal-title">Delete Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">                    
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- <script>
  // Get the element by its ID
  var deleteModal = document.getElementById('deleteEmployeeModal');

  // Remove the 'modal' class
  deleteModal.classList.remove('modal');
</script> 
</div> -->

<?php require_once APPROOT . '/views/inc/footer.php'; ?>