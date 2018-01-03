
<form method="post" action="#tabs-2">
    <div class="form-table">
        Domain name:<br>
        <input type="text" name="internetbs_domain"
               value="<?php echo isset($_POST['internetbs_domain']) ? $_POST['internetbs_domain'] : '' ?>"/><br>
        First name:<br>
        <input type="text" name="Registrant_FirstName"
               value="<?php echo isset($_POST['Registrant_FirstName']) ? $_POST['Registrant_FirstName'] : '' ?>"><br>
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
    <?php submit_button('Check The Domain'); ?>

</form>
<?php
require_once "param-array.php";
echo "Tst <br>";
//print_r($data);
echo "<br>";
echo "End Tst <br>";
?>
<?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL , "https://testapi.internet.bs/Domain/Create");
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

