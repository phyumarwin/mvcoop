<?php require_once APPROOT . '/views/inc/header.php'; ?>

<div class="wrapper d-flex align-items-stretch">
    <?php require_once APPROOT . '/views/inc/sidebar.php'; ?>
    <div id="content" class="p-4 p-md-5">
        <?php require_once APPROOT . '/views/inc/navbar.php'; ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="ml-0">Excel File Upload</h1>
                    <p><?php echo "Today is " . date("Y/m/d") . "<br>";?></p>
                </div>
            </div>
            <div class="row my-5 ml-2">
                    <div class="row" id="file">
                        <div class="col-md-4">
                            <form class="d-flex mt-5" action="<?php echo URLROOT ?>/expense/import" method="POST" enctype="multipart/form-data">
                                <input type="file" name="file" style="width: 263px;">
                                <input type="submit" value="Import" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row my-5 ml-2">
                    <div class="row">
                        <div class="col-md-12">
                            <a class="text-dark" href="<?php echo URLROOT;?>/Income/create">Upload with Form</a>
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </div>
                    </div>
            </div>
            </div>
            
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>