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
/*------Let's Enqueue our scripts---------*/
function internetbs_api_enqueue_script() {
    wp_enqueue_script( 'jquery-ui-core', $src, 'jquery', $ver, $in_footer );
    wp_enqueue_script( 'jquery-ui-tabs', $src, array('jquery', 'jquery-ui-core'), $ver, $in_footer );
    wp_enqueue_script( 'internetbs_api_custom_script', plugin_dir_url( __FILE__ ) . 'forms/partials/scripts.js', array('jquery'), '1.0' , 'true' );
    wp_enqueue_style('iternetbs-jquery-ui-css', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
}
add_action('admin_enqueue_scripts', 'internetbs_api_enqueue_script');
/*---------Our admin settings page---------*/
require_once 'internetBS-settings.php';
//require_once 'forms/partials/api-credentials.php';

/*------Begin domain check-----*/
function internet_bs_domain_page(){
    require_once 'forms/partials/api-credentials.php';
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
            <div class="wrap">
                <?php require_once "forms/domain-check-form.php"; ?>
            </div>

        </div>
        <div id="tabs-2">

            <div class="wrap">
                <?php require_once "forms/domain-registration-form.php"; ?>
            </div>
        </div>

        <div id="tabs-3">
            <div class="wrap">
                <?php require_once "forms/domain-update-form.php"; ?>
            </div>
        </div>
    <?php
}

?>