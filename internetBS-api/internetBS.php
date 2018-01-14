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
/*---------Our admin settings page---------*/
require_once 'internetBS-settings.php';

/*------Begin domain check-----*/
function internet_bs_domain_page()
{

    ?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        jQuery(function () {
            jQuery("#tabs").tabs();
        });
    </script>
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