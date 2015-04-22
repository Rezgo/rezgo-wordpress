<?php

add_action('admin_init', 'rezgo_register_settings');
add_action('admin_menu', 'rezgo_plugin_menu');
add_filter('plugin_action_links_rezgo/rezgo.php', 'rezgo_plugin_settings_link');

function rezgo_register_settings()
{
    register_setting('rezgo_options', 'rezgo_cid');
    register_setting('rezgo_options', 'rezgo_api_key');

    register_setting('rezgo_options', 'rezgo_captcha_pub_key');
    register_setting('rezgo_options', 'rezgo_captcha_priv_key');

    register_setting('rezgo_options', 'rezgo_result_num');
    register_setting('rezgo_options', 'rezgo_template');

    register_setting('rezgo_options', 'rezgo_forward_secure');
    register_setting('rezgo_options', 'rezgo_secure_url');

    wp_register_style('rezgo_settings_css', rezgo_embed_settings_css('settings.css'));
}

function rezgo_plugin_menu()
{
    $icon = rezgo_embed_settings_image('icon.png');
    $menu_page = add_menu_page('Rezgo Settings', 'Rezgo', 'manage_options', 'rezgo-settings', 'rezgo_plugin_settings', $icon);
    add_action('admin_print_styles-' . $menu_page, 'rezgo_plugin_admin_styles');
}

function rezgo_plugin_admin_styles()
{
    wp_enqueue_style('rezgo_settings_css');
}

function rezgo_plugin_settings_link($links)
{
    $settings_link = '<a href="admin.php?page=rezgo-settings">Settings</a>';
    array_unshift($links, $settings_link);
    return $links;
}

function rezgo_plugin_settings()
{
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }

    $rezgoPluginUpdated = false;
    if($_POST && $_POST['rezgo_update'] ) {
        rezgo_plugin_settings_update();
        $rezgoPluginUpdated = true;
    }

    $rezgoCID = get_option('rezgo_cid');
    $rezgoApiKey = get_option('rezgo_api_key');

    $companyName = '';
    $companyDomain = '';

    if(!empty($rezgoCID) && !empty($rezgoApiKey)) {
        $xmlCheckOutput = rezgo_curl_get_page('http://xml.rezgo.com/xml?transcode=' . $rezgoCID . '&key=' . $rezgoApiKey . '&i=company');
        /**
         * @TODO change check of output result
         */
        if ((string)$xmlCheckOutput->company_name) {
            $companyName = (string)$xmlCheckOutput->company_name;
            $companyDomain = (string)$xmlCheckOutput->domain;
        }
    }

    rezgo_render_settings_view('main_page.phtml', array(
        'permalinkStructure' => get_option('permalink_structure'),
        'rezgoCID' => get_option('rezgo_cid'),
        'rezgoApiKey' => get_option('rezgo_api_key'),
        'companyName' => $companyName,
        'companyDomain' => $companyDomain,
        'rezgoPluginUpdated' => $rezgoPluginUpdated,
    ));
}


function rezgo_plugin_settings_update()
{
    if($_POST['rezgo_secure_url']) {
        $_POST['rezgo_secure_url'] = str_replace("http://", "", $_POST['rezgo_secure_url']);
        $_POST['rezgo_secure_url'] = str_replace("https://", "", $_POST['rezgo_secure_url']);
    }

    if(!$_POST['rezgo_result_num']) {
        $_POST['rezgo_result_num'] = 10;
    }

    update_option('rezgo_cid', $_POST['rezgo_cid']);
    update_option('rezgo_api_key', $_POST['rezgo_api_key']);

    update_option('rezgo_captcha_pub_key', $_POST['rezgo_captcha_pub_key']);
    update_option('rezgo_captcha_priv_key', $_POST['rezgo_captcha_priv_key']);

    update_option('rezgo_result_num', $_POST['rezgo_result_num']);
    update_option('rezgo_template', $_POST['rezgo_template']);

    // since we set this value to 1 as default, make sure it's set to 0 if it's off
    if(!$_POST['rezgo_forward_secure']) {
        $_POST['rezgo_forward_secure'] = 0;
    }

    update_option('rezgo_forward_secure', $_POST['rezgo_forward_secure']);
    update_option('rezgo_secure_url', $_POST['rezgo_secure_url']);

    return true;
}

