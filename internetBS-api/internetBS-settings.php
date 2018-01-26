<?php
// create custom plugin settings menu
add_action('admin_menu', 'internetbs_api_plugin_create_menu');

function internetbs_api_plugin_create_menu()
{

    //create new top-level menu
    add_menu_page('InternetBS', 'InternetBS', 'manage_options', 'internetbs-domains', 'internet_bs_domain_page');
    //create our settings menu and our top-level menu
    add_submenu_page('internetbs-domains', 'API settings', 'API settings', 'manage_options', 'internetbs-settings', 'internetbs_api_plugin_settings_page');

    //call register settings function
    add_action('admin_init', 'register_internetbs_api_plugin_settings');
}


function register_internetbs_api_plugin_settings()
{
    //register our settings
    register_setting('my-cool-plugin-settings-group', 'internet_api_key');
    register_setting('my-cool-plugin-settings-group', 'internet_pass');
}

function internetbs_api_plugin_settings_page()
{
    ?>
    <div class="wrap">
        <h1>Your Plugin Name</h1>

        <form method="post" action="options.php">
            <?php settings_fields('my-cool-plugin-settings-group'); ?>
            <?php do_settings_sections('my-cool-plugin-settings-group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">API Key</th>
                    <td><input type="text" name="internet_api_key"
                               value="<?php echo esc_attr(get_option('internet_api_key')); ?>"/></td>
                </tr>

                <tr valign="top">
                    <th scope="row">Password</th>
                    <td><input type="password" name="internet_pass"
                               value="<?php echo esc_attr(get_option('internet_pass')); ?>"/></td>
                </tr>
            </table>

            <?php submit_button(); ?>

        </form>
    </div>
<?php }

?>