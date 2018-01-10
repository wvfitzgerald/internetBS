
<form method="post" action="#tabs-2">
    <div class="form-table">
        Domain name:<br>
        <input type="text" name="internetbs_domain"
               value="<?php echo isset($_POST['internetbs_domain']) ? $_POST['internetbs_domain'] : '' ?>"required/><br>
        First name:<br>
        <input type="text" name="Registrant_FirstName"
               value="<?php echo isset($_POST['Registrant_FirstName']) ? $_POST['Registrant_FirstName'] : '' ?>"required><br>
        Last name:<br>
        <input type="text" name="Registrant_Lastname"
               value="<?php echo isset($_POST['Registrant_Lastname']) ? $_POST['Registrant_Lastname'] : '' ?>"required>
        <br>
        Email:<br>
        <input type="email" name="registrant_email"
               value="<?php echo isset($_POST['registrant_email']) ? $_POST['registrant_email'] : '' ?>"required><br>
        Phone Number:<br>
        <input type="tel" name="registrant_phonenumber" placeholder="Format: 1.9999999999"
               value="<?php echo isset($_POST['registrant_phonenumber']) ? $_POST['registrant_phonenumber'] : '' ?>"required><br>
        Street:<br>
        <input type="text" name="registrant_street"
               value="<?php echo isset($_POST['registrant_street']) ? $_POST['registrant_street'] : '' ?>"required><br>
        City:<br>
        <input type="text"
               name="registrant_city" value="<?php echo isset($_POST['registrant_city']) ? $_POST['registrant_city'] : '' ?>"required
        "><br>


        State/Provence:<br>
        <input type="text" maxlength="2" size="2" placeholder="VA"
               name="registrant_state" value="<?php echo isset($_POST['registrant_state']) ? $_POST['registrant_state'] : '' ?>"required
        "><br>
        Postal Code:<br>
        <input type="number"
               name="registrant_postalcode" value="<?php echo isset($_POST['registrant_postalcode']) ? $_POST['registrant_postalcode'] : '' ?>"required
        "><br>
        Country Code:<br>
        <input type="text" maxlength="2" size="2" placeholder="US"
               name="registrant_countrycode" value="<?php echo isset($_POST['registrant_countrycode']) ? $_POST['registrant_countrycode'] : '' ?>"required
        "><br>

    </div>
    <?php submit_button('Check The Domain'); ?>

</form>
<?php



$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://testapi.internet.bs/Domain/Create",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => array (
        'ApiKey' =>  get_option('internet_api_key'),
        'Password' => get_option('internet_pass'),
        'domain' => $_POST['internetbs_domain'],
        'ResponseFormat' => 'JSON',
        'Registrant_FirstName' => $_POST['Registrant_FirstName'],
        'Registrant_Lastname' =>  $_POST['Registrant_Lastname'],
        'registrant_email' => $_POST['registrant_email'],
        'registrant_phonenumber' => $_POST['registrant_phonenumber'],
        'registrant_street' => $_POST['registrant_street'],
        'registrant_city' => $_POST['registrant_city'],
        'registrant_countrycode' => $_POST['registrant_countrycode'],
        'registrant_postalcode' => $_POST['registrant_postalcode'],
        'registrant_state' => $_POST['registrant_state'],
        'technical_FirstName' => $_POST['Registrant_FirstName'],
        'technical_Lastname' =>  $_POST['Registrant_Lastname'],
        'technical_email' => $_POST['registrant_email'],
        'technical_phonenumber' => $_POST['registrant_phonenumber'],
        'technical_street' => $_POST['registrant_street'],
        'technical_city' => $_POST['registrant_city'],
        'technical_countrycode' => $_POST['registrant_countrycode'],
        'technical_postalcode' => $_POST['registrant_postalcode'],
        'technical_state' => $_POST['registrant_state'],
        'billing_FirstName' => $_POST['Registrant_FirstName'],
        'billing_Lastname' =>  $_POST['Registrant_Lastname'],
        'billing_email' => $_POST['registrant_email'],
        'billing_phonenumber' => $_POST['registrant_phonenumber'],
        'billing_street' => $_POST['registrant_street'],
        'billing_city' => $_POST['registrant_city'],
        'billing_countrycode' => $_POST['registrant_countrycode'],
        'billing_postalcode' => $_POST['registrant_postalcode'],
        'billing_state' => $_POST['registrant_state'],
        'admin_FirstName' => $_POST['Registrant_FirstName'],
        'admin_Lastname' =>  $_POST['Registrant_Lastname'],
        'admin_email' => $_POST['registrant_email'],
        'admin_phonenumber' => $_POST['registrant_phonenumber'],
        'admin_street' => $_POST['registrant_street'],
        'admin_city' => $_POST['registrant_city'],
        'admin_countrycode' => $_POST['registrant_countrycode'],
        'admin_postalcode' => $_POST['registrant_postalcode'],
        'admin_state' => $_POST['registrant_state'],
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo "<br>";
    $obj= json_decode($response , true );
    //echo "New Test <br>";
    echo  $obj["product"][0]["message"];
   // echo "<br>";
   // echo  $obj["product"][0]["message"] . "<br>";
    //echo "VAR Dump <br>";
    //print_r($obj);

    //echo $response;
}

