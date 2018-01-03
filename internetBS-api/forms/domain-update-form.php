
<!--<script type="text/javascript">-->
<!--    jQuery( ".select-change" ).change(function() {-->
<!--    jQuery( "#contact-info" ).removeClass( "hide-me" ).addClass( "show-me" );-->
<!--    });-->
<!--</script>-->
<style type="text/css">
    .hide-me , .hide-address { display: none;}
    .show-me { display: block;}
</style>
<form method="post" action="#tabs-3">
    <div class="form-table">
        Domain To Be Updated:<br>
        <input type="text" name="internetbs_domain"
               value="<?php echo isset($_POST['internetbs_domain']) ? $_POST['internetbs_domain'] : '' ?>"/>
        <br>
        What would you like to update?
        <br>
        <select id="select-change" name="domain-update-options">
            <optgroup label="Contact Information">
            <option name="contacts-updates" value="value1">Select</option>
            <option name="Registrant_FirstName" value="Registrant_FirstName">First Name</option>
            <option name="Registrant_Lastname" value="Registrant_Lastname">Last Name</option>
            <option name="registrant_email" value="registrant_email">Email Address</option>
            <option name="registrant_phonenumber" value="registrant_phonenumber">Phone Number</option>
            <option name="registrant_street" value="registrant_address">Address</option>

            </optgroup>
        </select>
        <br>
        <?php
        $selectOption = $_POST['domain-update-options'];
        echo $selectOption . "<br>";
        //var_dump($selectOption);
        ?>

        <div >
        <br>
        <input type="text" name="<?php echo $selectOption; ?>"
               value="<?php echo isset($_POST[ $selectOption ]) ? $_POST[$selectOption] : '' ?>"><br>
        Last name:<br>
        <input type="text" name="Registrant_Lastname"
               value="<?php echo isset($_POST['Registrant_Lastname']) ? $_POST['Registrant_Lastname'] : '' ?>">
        <br>
        Email:<br>
        <input type="text" name="registrant_email"
               value="<?php echo isset($_POST['registrant_email']) ? $_POST['registrant_email'] : '' ?>"><br>
        Phone Number:<br>
        <input type="text" name="registrant_phonenumber" placeholder="1.5455454545"
               value="<?php echo isset($_POST['registrant_phonenumber']) ? $_POST['registrant_phonenumber'] : '' ?>"><br>
        <div id="contact-info" class="hide-address">
            Street:<br>
        <input type="text" name="registrant_street"
               value="<?php echo isset($_POST['registrant_street']) ? $_POST['registrant_street'] : '' ?>"><br>
        City:<br>
        <input type="text"
               name="registrant_city" <?php echo isset($_POST['registrant_city']) ? $_POST['registrant_city'] : '' ?>
        "><br>


        State:<br>
        <input type="text"
               name="registrant_state" <?php echo isset($_POST['registrant_state']) ? $_POST['registrant_state'] : '' ?>
        "><br>
        Postal Code:<br>
        <input type="text"
               name="registrant_postalcode" <?php echo isset($_POST['registrant_postalcode']) ? $_POST['registrant_postalcode'] : '' ?>
        "><br>
        Country Code:<br>
        <input type="text"
               name="registrant_countrycode" <?php echo isset($_POST['registrant_countrycode']) ? $_POST['registrant_countrycode'] : '' ?>
        "><br>
        </div>

    </div>
    <?php submit_button('Check The Domain'); ?>
    <script type="text/javascript">
        jQuery( "#select-change" ).change(function() {
            var test = jQuery("#select-change option:selected").val();
            if(test === 'registrant_address'){
            jQuery( "#contact-info" ).removeClass( "hide-me" ).addClass( "show-me" );
            }
            console.log(test);
        });
    </script>
</form>

<?php
$data = array(
    'ApiKey' => "testapi", // get_option('internet_bs_api_key'),
    'Password' =>  "testpass" ,//get_option('internet_bs_password'),
    'domain' => $_POST['internetbs_domain'],
    'ResponseFormat' => 'JSON',
    'Registrant_FirstName' => $_POST['Registrant_FirstName'],
);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL , "https://testapi.internet.bs/Domain/Update");
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST ,  "POST");
curl_setopt($curl, CURLOPT_POSTFIELDS, $data );
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_exec($curl);
$response = curl_exec($curl);
$err = curl_error($curl);
var_dump($response);
curl_close($curl);
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
    echo "<br>";
}
