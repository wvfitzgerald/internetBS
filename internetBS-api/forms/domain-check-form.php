<form method="post" action="#tabs-1">
    <div class="form-table">
        <span>Enter A Domain Name</span>
        <input type="text" name="internetbs_domain"
               value="<?php echo isset($_POST['internetbs_domain']) ? $_POST['internetbs_domain'] : '' ?>" required/>

    </div>
    <?php submit_button('Check The Domain'); ?>

</form>

<?php

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => $api_url ."/Domain/Check",
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
curl_exec($curl);
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
$obj = json_decode($response, true);
if (isset($_POST['submit'])) {
    if ($obj["status"] == "UNAVAILABLE") {
        echo "Sorry, that domain is not available. Please try another";
    } elseif ($obj["status"] === "FAILURE") {
        echo "Sorry, something went horribly wrong! Please try again <br>";
    } else {
        echo "Great, that domain is available. Register it now? ";
    }
}