<?php require_once APPROOT . '/views/inc/header.php'; ?>

<div class="wrapper d-flex align-items-stretch">
    <?php require_once APPROOT . '/views/inc/sidebar.php'; ?>
    <div id="content" class="p-4 p-md-5">
        <?php require_once APPROOT . '/views/inc/navbar.php'; ?>
        <div class="col-md-4">
            <h1 class="ml-0">New Income</h1>
            <p><?php echo "Today is " . date("Y/m/d") . "<br>";?></p>
        </div>
            <div class="container">
                    <div class="row">
                        <div class="col-md-12" style="margin-top:150px;">
                            <form  action="<?php echo URLROOT; ?>/Income/store" method="POST">
                                <div class="form-group">
                                    <label>Amount</label>
                                        <input type="number" name="amount" class="form-control" placeholder="enter amount here" required>
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
                                <button type="submit" class="btn btn-warning float-right" style="width:45%;">Add</button>
                            </form>
                        </div>
                    </div>
            </div>
    </div>
</div>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>