<form method="post" action="#tabs-1">
    <div class="form-table">
        <span>Enter A Domain Name</span>
        <input type="text" name="internetbs_domain"
               value="<?php echo isset($_POST['internetbs_domain']) ? $_POST['internetbs_domain'] : '' ?>"/>

    </div>
    <?php submit_button('Check The Domain'); ?>

</form>

<?php

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://testapi.internet.bs/Domain/Check",
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
    ),
));

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
var_dump($data);
//$jason = json_decode($response, true);
echo "<br>";
$obj= json_decode($response , true );
echo "New Test <br>";
echo  $obj["message"] . " ,please try another domain.";
echo "<br>";
echo  $obj["product"][0]["status"] . "<br>";
echo "VAR Dump <br>";
        print_r($obj);