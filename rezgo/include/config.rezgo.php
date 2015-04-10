<?php
    error_reporting(0);
	/* 
		---------------------------------------------------------------------------
			Basic configuration options 
		---------------------------------------------------------------------------
	*/

	// Your company ID and your API KEY for the Rezgo API, they can both be found 
	// on the main settings page on the Rezgo back-end.
	define(	"REZGO_CID", 								"1446"																						);
	define(	"REZGO_API_KEY",						"1D7-R1X1-U6E7-G3A"																						);
	
	// RECAPTCHA API keys for the contact page (get recaptcha: http://www.google.com/recaptcha)
	define(	"REZGO_CAPTCHA_PUB_KEY",		""																						);
	define(	"REZGO_CAPTCHA_PRIV_KEY",		""																						);
	
	// Path to the rezgo install on your server, the default is /rezgo in the root.
	// this is used by the template includes as well as fetching files in the templates
	define(	"REZGO_DIR",								"/wp-content/plugins/rezgo-booking/rezgo"																			);
	
	// The web root you want to precede links, the default is "" (empty) for root
	// to change to your own custom directory, add it like /my_directory or /my/directory
	define( "REZGO_URL_BASE",						"/wp-content/plugins/rezgo-booking"																						);
	
	// The top level frame you want to use as a destination for your links
	// works with top, blank, self, parent
	define( "REZGO_FRAME_TARGET",				"top"																					);
	
	// Redirect page for fatal errors, set this to 0 to disable
	define(	"REZGO_FATAL_ERROR_PAGE",		"/error.php"																	);
	
	// The number of results per search page, this is used exclusively by the templates
	define(	"REZGO_RESULTS_PER_PAGE",		10																						);
	
	/* 
		---------------------------------------------------------------------------
			Advanced configuration options 
		---------------------------------------------------------------------------
	*/
	
	// shopping cart lifespan
	define( "REZGO_CART_TTL",							86400																				);
	
	define( "REZGO_TEMPLATE", 						'default'																		);
	
	// Forward secure booking pages to the rezgo white-label, set to 0 if you want to
	// use your own domain for the secure pages
	define(	"REZGO_FORWARD_SECURE",			0																							);
	
	// By default, rezgo will use your own site as the secure site if forwarding is disabled,
	// if you want to use a different URL, then set it here (do not include https://)
	define( "REZGO_SECURE_URL",					$this_uri.'.'.$base_url												);
	
	// Disable the header and footer passed from the XML gateway. Enable this if you are embedding
	// rezgo inside your own design.  This is only used by the header and footer templates
	define(	"REZGO_HIDE_HEADERS",				1																							);
	
	// The address of the Rezgo XML, can use xml.rezgo.com or xml.beta.rezgo.com
	define( "REZGO_XML",								'xml.rezgo.com'																);
	
	// The Rezgo XML version you want to use, this setting should not be changed
	define(	"REZGO_XML_VERSION",				"current"																			);
	
	/* 
		---------------------------------------------------------------------------
			Error and debug handling 
		---------------------------------------------------------------------------
	*/
	
	// Send errors to firebug via console (get firebug: http://getfirebug.com/)
	define(	"REZGO_FIREBUG_ERRORS",				0																						);
	
	// Display errors if they occur, disabled if you just want to send errors to firebug
	define(	"REZGO_DISPLAY_ERRORS",				1																						);
	
	// Stop the page loading if an error occurs
	define(	"REZGO_DIE_ON_ERROR",					0																						);
	
	// Output all XML transactions. THIS MUST BE SET TO 1 TO USE THE SETTINGS BELOW
	define(	"REZGO_TRACE_XML",					0																							);
	
	// Include calls to the XML Cache (repeat queries) in the XML output
	define(	"REZGO_INCLUDE_CACHE_XML",		0																						);
	
	// Send the XML requests to Firebug, to avoid disrupting the page design
	define(	"REZGO_FIREBUG_XML",					1																						);
	
	// Switch the commit XML debug for one more suited for AJAX
	define(	"REZGO_SWITCH_COMMIT",				1																						);
	
	// Stop the commit request so booking AJAX responses can be checked
	define(	"REZGO_STOP_COMMIT",					1																						);
	
	// Display the XML inline with the regular page content
	define(	"REZGO_DISPLAY_XML",					0																						);
	
	// Display the XML inline with the regular page content
	define(	"REZGO_DISPLAY_RESPONSES",		0																						);
	
?>