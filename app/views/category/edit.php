<?php require_once APPROOT . '/views/inc/header.php'; ?>

<div class="wrapper d-flex align-items-stretch">
    <?php require_once APPROOT . '/views/inc/sidebar.php'; ?>
    <div id="content" class="p-4 p-md-5">
        <?php require_once APPROOT . '/views/inc/navbar.php'; ?>
        <div class="col-md-4">
            <h1 class="ml-0">Edit Category</h1>
            <p><?php echo "Today is " . date("Y/m/d") . "<br>"; ?></p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="margin-top:150px;">
                    <form action="<?php echo URLROOT; ?>/category/update" method="POST">
                        <input type="hidden" name="id" value="<?php echo $data['categories']['id']; ?>">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="<?php echo $data['categories']['name']; ?>" class="form-control" placeholder="enter name here" required>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select class="form-control" style="height:36px;" name="type_id">
                                <?php foreach ($data['types'] as $type) { ?>
                                    <option value="<?php echo $type['id']; ?>" 
                                        <?php if ($type['id'] == $data['categories']['type_id']) 
                                        {
                                            echo " selected";
                                        } ?>>

                                        <?php echo $type['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Description </label>
                            <textarea class="form-control" name="description" style="height:100px;" required><?php echo $data['categories']['description']; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning float-right" style="width:45%;">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>