<?php if (isset($_SESSION['success'])) { ?>
    <div class="alert text-center alert-success" role="alert">
        <?php echo $_SESSION['success'];
        unsetMessage('success');
        ?>
    </div>
<?php } ?>

<?php if (isset($_SESSION['error'])) { ?>
    <p class="text-center text-danger my-3 font-weight-bold">
        <?php echo $_SESSION['error'];
        unsetMessage('error');
        ?>
    </p>
<?php } ?>
