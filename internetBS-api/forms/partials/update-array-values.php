<?php
/**
 * Getting the proper info for the domain update form
 */

if($_POST['domain-update-options'] == "Registrant_FirstName") {
    $update_value = array(
    'Registrant_FirstName' => $_POST['Registrant_FirstName'],
    'Registrant_Lastname' => $_POST['Registrant_Lastname'],
        'technical_FirstName' => $_POST['Registrant_FirstName'],
        'technical_Lastname' => $_POST['Registrant_Lastname'],
        'billing_FirstName' => $_POST['Registrant_FirstName'],
        'billing_Lastname' => $_POST['Registrant_Lastname'],
        'admin_FirstName' => $_POST['Registrant_FirstName'],
        'admin_Lastname' => $_POST['Registrant_Lastname'],
   );
}elseif($_POST['domain-update-options'] == 'registrant_email') {
     $update_value = array(
     'registrant_email' => $_POST['registrant_email'],
      );
}elseif($_POST['domain-update-options'] == 'registrant_phonenumber') {
                 $update_value = array(
                     'registrant_phonenumber' => $_POST['registrant_phonenumber'],
                 );
             }elseif($_POST['domain-update-options'] ==  "registrant_address") {
                 $update_value = array(
                     'registrant_street' => $_POST['registrant_street'],
                     'registrant_city' => $_POST['registrant_city'],
                     'registrant_countrycode' => $_POST['registrant_countrycode'],
                     'registrant_postalcode' => $_POST['registrant_postalcode'],
                     'registrant_state' => $_POST['registrant_state'],
                     'technical_street' => $_POST['registrant_street'],
                     'technical_city' => $_POST['registrant_city'],
                     'technical_countrycode' => $_POST['registrant_countrycode'],
                     'technical_postalcode' => $_POST['registrant_postalcode'],
                     'technical_state' => $_POST['registrant_state'],
                     'billing_street' => $_POST['registrant_street'],
                     'billing_city' => $_POST['registrant_city'],
                     'billing_countrycode' => $_POST['registrant_countrycode'],
                     'billing_postalcode' => $_POST['registrant_postalcode'],
                     'billing_state' => $_POST['registrant_state'],
                     'admin_street' => $_POST['registrant_street'],
                     'admin_city' => $_POST['registrant_city'],
                     'admin_countrycode' => $_POST['registrant_countrycode'],
                     'admin_postalcode' => $_POST['registrant_postalcode'],
                     'admin_state' => $_POST['registrant_state'],
                 );
             }elseif($_POST['domain-update-options'] ==  "Ns_list") {
    $update_value = array(
        'Ns_list' => $_POST['Ns_list'],
    );
     }
