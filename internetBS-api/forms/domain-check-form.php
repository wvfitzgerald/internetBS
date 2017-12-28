<form method="post" action="#tabs-1">
    <div class="form-table">
        <span>Enter A Domain Name</span>
        <input type="text" name="internetbs_domain"
               value="<?php echo isset($_POST['internetbs_domain']) ? $_POST['internetbs_domain'] : '' ?>"/>

    </div>
    <?php submit_button('Check The Domain'); ?>

</form>