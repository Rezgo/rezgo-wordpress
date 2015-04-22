<?php

/*
    Plugin Name: Rezgo Online Booking
    Plugin URI: http://wordpress.org/extend/plugins/rezgo-online-booking/
    Description: Connect WordPress to your Rezgo account and accept online bookings directly on your website.
    Version: 2.0.0в
    Author: Rezgo
    Author URI: http://www.rezgo.com
    License: Modified BSD
*/

/*
    - Documentation and latest version
            http://support.rezgo.com/developers/rezgo-open-source-php-parser.html

    - Finding your Rezgo CID and API KEY
            http://support.rezgo.com/developers/xml-api-key

    AUTHOR:
            Kevin Campbell, John McDonald

    Copyright (c) 2011-2014, Rezgo (A Division of Sentias Software Corp.)
    All rights reserved.

    Redistribution and use in source form, with or without modification,
    is permitted provided that the following conditions are met:

    * Redistributions of source code must retain the above copyright
    notice, this list of conditions and the following disclaimer.
    * Neither the name of Rezgo, Sentias Software Corp, nor the names of
    its contributors may be used to endorse or promote products derived
    from this software without specific prior written permission.
    * Source code is provided for the exclusive use of Rezgo members who
    wish to connect to their Rezgo XMP API.  Modifications to source code
    may not be used to connect to competing software without specific
    prior written permission.

    THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
    "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
    LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
    A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
    HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
    SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
    LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
    DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
    THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
    (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
    OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/
//error_reporting(0);
ob_start();

define('REZGO_PLUGIN_DIR', plugin_dir_path(__FILE__));

require_once('rezgo_service_functions.php');
require_once('rezgo_plugin_logic.php');

rezgo_inlude_file('/settings/rezgo_settings.php');

register_activation_hook(__FILE__, 'flush_rewrite_rules');
add_action('generate_rewrite_rules', 'rezgo_add_rewrite_rules');

add_shortcode('rezgo_shortcode', 'rezgo_iframe');
add_action('rezgo_tpl_display', 'rezgo_iframe');


