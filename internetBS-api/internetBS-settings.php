<?php
/**
 * @internal never define functions inside callbacks.
 * these functions could be run multiple times; this would result in a fatal error.
 */

/**
 * custom option and settings
 */
function internetBS_settings_init(){
    // register a new setting for "internetBS" page
    //register_setting( 'internetBS', 'internetBS_options' );
    register_setting('internet-bs-plugin-settings-group' , 'internet_bs_api_key');
    register_setting('internet-bs-plugin-settings-group' , 'internet_bs_password');
    // register a new section in the "internetBS" page
    add_settings_section(
        'internetBS_section_developers',
        __( 'The Matrix has you.', 'internetBS' ),
        'internetBS_section_developers_cb',
        'internetBS'
    );

    // register a new field in the "internetBS_section_developers" section, inside the "internetBS" page
    add_settings_field(
        'internetBS_field_pill', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __( 'Pill', 'internetBS' ),
        'internetBS_field_pill_cb',
        'internetBS',
        'internetBS_section_developers',
        [
            'label_for' => 'internetBS_field_pill',
            'class' => 'internetBS_row',
            'internetBS_custom_data' => 'custom',
        ]
    );
}

/**
 * register our internetBS_settings_init to the admin_init action hook
 */
add_action( 'admin_init', 'internetBS_settings_init' );

/**
 * custom option and settings:
 * callback functions
 */

// developers section cb

// section callbacks can accept an $args parameter, which is an array.
// $args have the following keys defined: title, id, callback.
// the values are defined at the add_settings_section() function.
function internetBS_section_developers_cb( $args ) {
    ?>
    <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Follow the white rabbit.', 'internetBS' ); ?></p>
    <?php
}

// pill field cb

// field callbacks can accept an $args parameter, which is an array.
// $args is defined at the add_settings_field() function.
// wordpress has magic interaction with the following keys: label_for, class.
// the "label_for" key value is used for the "for" attribute of the <label>.
// the "class" key value is used for the "class" attribute of the <tr> containing the field.
// you can add custom key value pairs to be used inside your callbacks.
function internetBS_field_pill_cb( $args ) {
    // get the value of the setting we've registered with register_setting()
    $options = get_option( 'internetBS_options' );
    // output the field
    ?>
    <select id="<?php echo esc_attr( $args['label_for'] ); ?>"
            data-custom="<?php echo esc_attr( $args['internetBS_custom_data'] ); ?>"
            name="internetBS_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
    >
        <option value="red" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'red', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'red pill', 'internetBS' ); ?>
        </option>
        <option value="blue" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'blue', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'blue pill', 'internetBS' ); ?>
        </option>
    </select>
    <p class="description">
        <?php esc_html_e( 'You take the blue pill and the story ends. You wake in your bed and you believe whatever you want to believe.', 'internetBS' ); ?>
    </p>
    <p class="description">
        <?php esc_html_e( 'You take the red pill and you stay in Wonderland and I show you how deep the rabbit-hole goes.', 'internetBS' ); ?>
    </p>
    <?php
}
/**
 * top level menu
 */
function internetBS_options_page() {
    // add top level menu page
    add_submenu_page(
        'options-general.php',
        'InternetBS',
        'InternetBS Settings',
        'manage_options',
        'internetBS',
        'internetBS_options_page_html'
    );
}

/**
 * register our internetBS_options_page to the admin_menu action hook
 */
add_action( 'admin_menu', 'internetBS_options_page' );

/**
 * top level menu:
 * callback functions
 */
function internetBS_options_page_html() {
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    // add error/update messages

    // check if the user have submitted the settings
    // wordpress will add the "settings-updated" $_GET parameter to the url
    if ( isset( $_GET['settings-updated'] ) ) {
        // add settings saved message with the class of "updated"
        add_settings_error( 'internetBS_messages', 'internetBS_message', __( 'Settings Saved', 'internetBS' ), 'updated' );
    }

    // show error/update messages
    settings_errors( 'internetBS_messages' );
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
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
    <?php
}