<?php

/*
Plugin Name: Internet BS API
Plugin URI: http://wvfitzgerald.com
Description: Check for available domain names and register them through internet.bs
Version: 0.1.0
Author: Bill Fitzgerald
Author URI: http://wvfitzgerald.com
Text Domain: internetbs
Domain Path: /languages
*/
require_once 'internetBS-settings.php';
/*---------Our admin settings page---------*/


    add_action('admin_menu', 'internet_bs_plugin_create_menu');
    function internet_bs_plugin_create_menu()
    {

        //create our settings menu and our top-level menu
        add_menu_page('InternetBS', 'InternetBS', 'manage_options', 'internetbs-domains', 'internet_bs_domain_page');
        add_options_page('InternetBS Settings', 'InternetBS', 'manage_options', 'internetbs-settings', 'internet_bs_plugin_settings_page');

    }

    function register_internet_bs_plugin_settings()
    {
        //register our settings
        register_setting('internet-bs-plugin-settings-group' , 'internet_bs_api_key');
        register_setting('internet-bs-plugin-settings-group' , 'internet_bs_password');
    }

    function internet_bs_plugin_settings_page()
    {
        ?>
        <div class="wrap">

            <h1>InternetBS settings</h1>

            <form method="post" action="options.php">
                <?php settings_fields('internet-bs-plugin-settings-group'); ?>
                <?php do_settings_sections('internet-bs-plugin-settings-group'); ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">API Key</th>
                        <td><input type="text" name="internet_bs_api_key"
                                   value="<?php echo esc_attr(get_option('internet_bs_api_key')); ?>"/></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Password</th>
                        <td><input type="text" name="internet_bs_password"
                                   value="<?php echo esc_attr(get_option('internet_bs_password')); ?>"/></td>
                    </tr>

                </table>

                <?php submit_button(); ?>

            </form>
        </div>
    <?php }

    /*------End settings page-------*/

    /*------Begin domain check-----*/



    /*------Begin domain check-----*/
    function internet_bs_domain_page(){

    ?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        jQuery( function() {
            jQuery( "#tabs" ).tabs();
        } );
    </script>";
    ?>
    <div class="wrap">
        <h1>InternetBS Domains</h1>
    </div>
    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Check Domain Availability</a></li>
            <li><a href="#tabs-2">Register A Domain</a></li>
            <li><a href="#tabs-3">Update A Domain</a></li>
        </ul>
        <div id="tabs-1">
            <form method="post" action="#tabs-1">
                <div class="form-table">
                    <span>Enter A Domain Name</span>
                    <input type="text" name="internetbs_domain"
                           value="<?php echo isset($_POST['internetbs_domain']) ? $_POST['internetbs_domain'] : '' ?>"/>

                </div>
                <?php submit_button('Check The Domain'); ?>

            </form>
        </div>
        <div id="tabs-2">
            <div class="wrap">


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
            </div>

<?php

$data = array (
    'ApiKey' =>  get_option('internet_bs_api_key'),
    'Password' =>  get_option('internet_bs_password'),
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
);


echo "Tst <br>";
print_r($data);
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
//$jason = json_decode($response, true);
echo "<br>";
$obj= json_decode($response , true );
echo "New Test <br>";
echo  $obj['message'];
echo "<br>";
echo  $obj['status'] . "<br>";
        //var_dump($obj);
    }


?>