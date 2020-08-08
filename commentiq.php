<?php

/*
Plugin Name: Bestwebsite Comments
Description: Analyze comments to determine which are most articulate & relevant. Place them near the top of the post.
Author: bestwebsite
Version: 1.0
Author URI: https://bestwebsite.com
*/

define( 'bestwebsite_COMMENTS_DIR_NAME', plugin_basename(__FILE__) );

function bestwebsite_comments_text_domain() {
    load_plugin_textdomain( 'bestwebsite-comments', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

// Setup class autoloader
require_once dirname(__FILE__) . '/src/CommentIQ/Autoloader.php';
CommentIQ_Autoloader::register();

// Load Comment IQ
$commentiq_plugin = new CommentIQ_Plugin(__FILE__);
add_action( 'plugins_loaded', array( $commentiq_plugin, 'load' ) );
add_action( 'plugins_loaded', 'bestwebsite_comments_text_domain' );
