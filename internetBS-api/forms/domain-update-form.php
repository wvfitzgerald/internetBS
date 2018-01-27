<style type="text/css">
    .hide-me {
        display: none;
    }

    .show-me {
        display: block;
    }

</style>
<div style="width: 30%; float: left;">
    <form method="post" action="#tabs-3">
        <div class="form-table">
            Domain To Be Updated:<br>
            <input type="text" name="internetbs_domain"
                   value="<?php echo isset($_POST['internetbs_domain']) ? $_POST['internetbs_domain'] : '' ?>"
                   required/>
            <br>
            What would you like to do?
            <br>
            <select id="select-change" name="domain-update-options">
                <optgroup label="Contact Information">
                    <option name="contacts-updates" value="current_domain_info">View Current Information</option>
                    <option name="Registrant_FirstName" value="Registrant_FirstName">Update Name</option>
                    <option name="registrant_email" value="registrant_email">Update Email Address</option>
                    <option name="registrant_phonenumber" value="registrant_phonenumber">Update Phone Number</option>
                    <option name="registrant_street" value="registrant_address">Update Address</option>
                    <option name="Ns_list" value="Ns_list">Update Name Servers</option>

                </optgroup>
            </select>

            <?php
            $selectOption = $_POST['domain-update-options'];
            ?>

            <div>
                <br>
                <div id='Registrant-FirstName' class='hide-me'>
                    First name:<br>
                    <input type="text" name="Registrant_FirstName"
                           value="<?php echo isset($_POST['Registrant_FirstName']) ? $_POST['Registrant_FirstName'] : '' ?>"><br>
                    Last name:<br>
                    <input type="text" name="Registrant_Lastname"
                           value="<?php echo isset($_POST['Registrant_Lastname']) ? $_POST['Registrant_Lastname'] : '' ?>">
                    <br>
                </div>
                <div id='registrant-email' class='hide-me'>
                    Email:<br>
                    <input type="text" name="registrant_email"
                           value="<?php echo isset($_POST['registrant_email']) ? $_POST['registrant_email'] : '' ?>"><br>
                </div>
                <div id='Registrant-phonenumber' class='hide-me'>
                    Phone Number:<br>
                    <input type="tel" name="registrant_phonenumber" placeholder="1.5455454545"
                           value="<?php echo isset($_POST['registrant_phonenumber']) ? $_POST['registrant_phonenumber'] : '' ?>"><br>
                </div>
                <div id="contact-info" class="hide-me">
                    Street:<br>
                    <input type="text" name="registrant_street"
                           value="<?php echo isset($_POST['registrant_street']) ? $_POST['registrant_street'] : '' ?>"><br>
                    City:<br>
                    <input type="text"
                           name="registrant_city"
                           value="<?php echo isset($_POST['registrant_city']) ? $_POST['registrant_city'] : '' ?>"
                    "><br>


                    State:<br>
                    <input type="text"
                           name="registrant_state"
                           value="<?php echo isset($_POST['registrant_state']) ? $_POST['registrant_state'] : '' ?>"
                    "><br>
                    Postal Code:<br>
                    <input type="text"
                           name="registrant_postalcode"
                           value="<?php echo isset($_POST['registrant_postalcode']) ? $_POST['registrant_postalcode'] : '' ?>"
                    "><br>
                    Country Code:<br>
                    <input type="text"
                           name="registrant_countrycode"
                           value="<?php echo isset($_POST['registrant_countrycode']) ? $_POST['registrant_countrycode'] : '' ?>"
                    "><br>
                </div>
                <div id='Ns-list' class='hide-me'>
                    Name Servers:<br>
                    <input type="text" placeholder="ns1.example.com 192.5.4.3, ns2.example.com 201.9.21.72" size="55"
                           name="Ns_list" "<?php echo isset($_POST['Ns_list']) ? $_POST['Ns_list'] : '' ?>"
                    "><br>
                </div>

            </div>
        </div>
        <?php submit_button('Update'); ?>
    </form>
</div>

<?php
$curl = curl_init();

if ($_POST['domain-update-options'] == "current_domain_info") {
    /* Get Current Domain Info*/
    curl_setopt_array($curl, array(
        CURLOPT_URL => $api_url . "/Domain/Info",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => array(
            'ApiKey' => $api_key,
            'Password' => $api_pass,
            'domain' => $_POST['internetbs_domain'],
            'ResponseFormat' => 'JSON',
        ),
    ));

    /*end*/
} else {
    require_once 'partials/update-array-values.php';
    $required_values = array(
        'ApiKey' => $api_key,
        'Password' => $api_pass,
        'domain' => $_POST['internetbs_domain'],
        'ResponseFormat' => 'JSON',
    );
    if (!is_null($update_value)) {
        $new_values = $required_values + $update_value;
    } else {
        $new_values = $required_values;
    }
    curl_setopt_array($curl, array(
        CURLOPT_URL => $api_url . "/Domain/Update",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $new_values,
    ));
}
$response = curl_exec($curl);
$err = curl_error($curl);
//echo $response;
curl_close($curl);
$obj = json_decode($response, true);
echo "<div style =\"width: 70%; float: right;\">";
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo "<b>Domain</b>:  " . $obj["domain"] . "<br>";
    echo "<b>Expires:</b>  " . $obj["expirationdate"] . "<br>";
    echo "<b>Registrar Lock:</b>  " . $obj["registrarlock"] . "<br>";
    echo "<b>Whois Privacy: </b> " . $obj["privatewhois"] . "<br>";
    echo "<h4>Contact Information:</h4>";
    echo "<b>First Name: </b> " . $obj["contacts"]["registrant"]["firstname"] . "<br>";
    echo "<b>Last Name: </b> " . $obj["contacts"]["registrant"]["lastname"] . "<br>";
    echo "<b>Email: </b> " . $obj["contacts"]["registrant"]["email"] . "<br>";
    echo "<b>Phone Number:</b>  " . $obj["contacts"]["registrant"]["phonenumber"] . "<br>";
    echo "<b>Organization:</b>  " . $obj["contacts"]["registrant"]["organization"] . "<br>";
    echo "<b>City:  </b>" . $obj["contacts"]["registrant"]["city"] . "<br>";
    echo "<b>State/Provence:</b>  " . $obj["contacts"]["registrant"]["state"] . "<br>";
    echo "<b>Street: </b> " . $obj["contacts"]["registrant"]["street"] . "<br>";
    echo "<b>Street Two: </b> " . $obj["contacts"]["registrant"]["street2"] . "<br>";
    echo "<b>Street Three:</b>  " . $obj["contacts"]["registrant"]["street3"] . "<br>";
    echo "<b>Postal Code:</b>  " . $obj["contacts"]["registrant"]["postalcode"] . "<br>";
    echo "<b>Country:</b>  " . $obj["contacts"]["registrant"]["countrycode"] . "<br>";
    echo "<b>Nameserver One:</b>  " . $obj["nameserver"][0] . "<br>";
    echo "<b>Nameserver Two:</b>  " . $obj["nameserver"][1] . "<br>";
    echo "<b>Nameserver Three:</b>  " . $obj["nameserver"][2] . "<br>";
    echo "<b>Nameserver Four:</b>  " . $obj["nameserver"][3] . "<br>";
}

echo "</div>";