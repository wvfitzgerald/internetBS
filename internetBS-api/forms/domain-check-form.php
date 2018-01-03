<form method="post" action="#tabs-1">
    <div class="form-table">
        <span>Enter A Domain Name</span>
        <input type="text" name="internetbs_domain"
               value="<?php echo isset($_POST['internetbs_domain']) ? $_POST['internetbs_domain'] : '' ?>"/>

    </div>
    <?php submit_button('Check The Domain'); ?>

</form>

<?php
$data = array (
    'ApiKey' => "testapi", // get_option('internet_bs_api_key'),
    'Password' =>  "testpass" ,//get_option('internet_bs_password'),
    'domain' => $_POST['internetbs_domain'],
    'ResponseFormat' => 'JSON',
);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL , "https://testapi.internet.bs/Domain/Check");
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

//$jason = json_decode($response, true);
echo "<br>";
$obj= json_decode($response , true );
echo "New Test <br>";
echo  $obj["message"] . " ,please try another domain.";
echo "<br>";
echo  $obj["product"][0]["status"] . "<br>";
echo "VAR Dump <br>";
        print_r($obj);