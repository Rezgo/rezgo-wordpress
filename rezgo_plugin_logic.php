<?php

function rezgo_iframe()
{
    global $wp;
    // the pagename can hide under a couple different names
    $wp_current_page = $wp->query_vars['name'];

    rezgo_inlude_file('/rezgo-parser/frame.php', array(
        'wp_current_page' => $wp_current_page,
    ));
}

