<?php require_once APPROOT . '/views/inc/header.php'; ?>

<div class="wrapper d-flex align-items-stretch">
    <?php require_once APPROOT . '/views/inc/sidebar.php'; ?>
    <div id="content" class="p-4 p-md-5">
        <?php require_once APPROOT . '/views/inc/navbar.php';?>
        <div class="col-md-4">
            <h1 class="ml-0">New Expense</h1>
            <p><?php echo "Today is " . date("Y/m/d") . "<br>";?></p>
        </div>

        <div class="container">
                <div class="row">
                    <div class="col-md-7">
                            
                    </div>
                    <div class="col-md-5 mt-5">
                        <a class="text-dark" href="<?php echo URLROOT;?>/expense/importFile" id="select">Upload Your Excel File</a>
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                            
                    </div>
                    <div class="col-md-12" style="margin-top:150px;">
                        <form  action="<?php echo URLROOT; ?>/expense/store" method="POST">
                        <form id="form" name="amountCheck">
                            <div class="form-group">
                                <label>Amount</label>
                                    <input type="number" name="amount" id="amount" class="form-control" placeholder="enter amount here" required>
                            </div>
                            <div class="form-group" id="qty">
                                <label>Quantity</label>
                                    <input type="number" name="qty" class="form-control" placeholder="enter quantity here" required>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                    <select  class="form-control" style="height:36px;" name="category_id">
                                        <?php foreach ($data['categories'] as $category) { ?>
                                        <option value="<?php echo $category['id']; ?>" selected>
                                            <?php echo $category['name']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                            </div>

                            <button type="button" class="btn btn-danger" style="width:45%;">Reset</button>
                            <button type="submit" id="addnew" class="btn btn-warning float-right" style="width:45%;">Add</button>

                            
                        </form>
                    </div>
                </div>
                <!-- <div class="row" id="file">
                    <div class="col-md-7">
                    
                    </div>
                    <div class="col-md-5">
                        <form class="d-flex mt-5" action="<?php echo URLROOT ?>/incomeApi/import" method="POST" enctype="multipart/form-data">
                            <input type="file" name="file" style="width: 240px;">
                            <input type="submit" value="Import" class="btn btn-primary">
                        </form>
                    </div>
                </div> -->
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>

<script type="text/javascript">

$(document).ready(function(){
    $('#file').hide();
});
$('#select').on('change',function(){
            if($(this).val() == 'type'){
                $('#form').hide();
                $('#file').show();
                // $('h1').text('New Expense');
            }else{
                $('#file').hide();
                $('#form').show();
                // $('h1').text('New Income');
            }
        });

    $(function () {
        $('#myselect').on('change',function(){
            if($(this).val() == 'Expense'){
                $('#qty').show();
                $('h1').text('New Expense');
            }else{
                $('#qty').hide();
                $('h1').text('New Income');
            }
        });

        $('#addnew').on('click', function () {
            var url = $('#myselect').val();
            // alert(url);

            var form_url = '<?php echo URLROOT; ?>/' + url + '/store';
            // alert(form_url);

            $.ajax({
                url : form_url,
                type : 'POST',
                data : $('form').serialize(),
                success : function () {
                    
                }
            });
        });
        
});
$(function () {
		
		var str=$('name').val();
		if(/^[a-zA-Z- ]*$/.test(str) == false) {
				alert('Your search string contains illegal characters.');
			}
        $("form[name='amountCheck']").validate({
            // Define validation rules
            rules: {
                amount: "required",

                amount: {
                    required: true,
                },
                
            },
            // Specify validation error messages
            messages: {
				required: "Please enter your amount",
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>