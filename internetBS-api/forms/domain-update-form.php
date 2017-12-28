
<form method="post" action="#tabs-3">
    <div class="form-table">
        Domain To Be Updated:<br>
        <input type="text" name="internetbs_domain"
               value="<?php echo isset($_POST['internetbs_domain']) ? $_POST['internetbs_domain'] : '' ?>"/>
        <br>
        What would you like to update?
        <br>
        <select name="domain-update-options">
            <optgroup label="Contact Information">
            <option name="contacts-updates" value="value1">Select</option>
            <option name="Registrant_FirstName" value="Registrant_FirstName">First Name</option>
            <option name="Registrant_Lastname" value="Registrant_Lastname">Last Name</option>
            <option name="registrant_email" value="registrant_email">Email Address</option>
            <option name="registrant_phonenumber" value="registrant_phonenumber">Phone Number</option>
            <option name="registrant_street" value="registrant_street">Street</option>
            <option name="registrant_city" value="registrant_city">City</option>
            <option name="registrant_state" value="registrant_state">State/Provence</option>
            <option name="registrant_postalcode" value="registrant_postalcode">Postal Code</option>
            <option name="registrant_countrycode" value="registrant_countrycode">Country Code</option>
            </optgroup>
        </select>
        <br>
        <?php
        $selectOption = $_POST['domain-update-options'];
        echo $selectOption . "<br>";
        //var_dump($selectOption);
        ?>
        <br>
        <input type="text" name="<?php echo $selectOption; ?>"
               value="<?php echo isset($_POST[ $selectOption ]) ? $_POST[$selectOption] : '' ?>"><br>
<!--        Last name:<br>-->
<!--        <input type="text" name="Registrant_Lastname"-->
<!--               value="--><?php //echo isset($_POST['Registrant_Lastname']) ? $_POST['Registrant_Lastname'] : '' ?><!--">-->
<!--        <br>-->
<!--        Email:<br>-->
<!--        <input type="text" name="registrant_email"-->
<!--               value="--><?php //echo isset($_POST['registrant_email']) ? $_POST['registrant_email'] : '' ?><!--"><br>-->
<!--        Phone Number:<br>-->
<!--        <input type="text" name="registrant_phonenumber" placeholder="1.5455454545"-->
<!--               value="--><?php //echo isset($_POST['registrant_phonenumber']) ? $_POST['registrant_phonenumber'] : '' ?><!--"><br>-->
<!--        Street:<br>-->
<!--        <input type="text" name="registrant_street"-->
<!--               value="--><?php //echo isset($_POST['registrant_street']) ? $_POST['registrant_street'] : '' ?><!--"><br>-->
<!--        City:<br>-->
<!--        <input type="text"-->
<!--               name="registrant_city" --><?php //echo isset($_POST['registrant_city']) ? $_POST['registrant_city'] : '' ?>
<!--        "><br>-->
<!---->
<!---->
<!--        State:<br>-->
<!--        <input type="text"-->
<!--               name="registrant_state" --><?php //echo isset($_POST['registrant_state']) ? $_POST['registrant_state'] : '' ?>
<!--        "><br>-->
<!--        Postal Code:<br>-->
<!--        <input type="text"-->
<!--               name="registrant_postalcode" --><?php //echo isset($_POST['registrant_postalcode']) ? $_POST['registrant_postalcode'] : '' ?>
<!--        "><br>-->
<!--        Country Code:<br>-->
<!--        <input type="text"-->
<!--               name="registrant_countrycode" --><?php //echo isset($_POST['registrant_countrycode']) ? $_POST['registrant_countrycode'] : '' ?>
<!--        "><br>-->
<!---->

    </div>
    <?php submit_button('Check The Domain'); ?>

</form>