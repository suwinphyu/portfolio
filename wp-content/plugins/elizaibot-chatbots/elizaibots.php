<?php
/*
Plugin Name: Elizaibots
Plugin Script: elizaibots.php
Plugin URI: http://blog.program-o.com/2013/09/wordpress-chatbot-plugin/
Description: Add this Elizaibots to your wordpress site. Use the simple shortcode [elizaibot-chat] to embed the chatbot in your site and amuse your readers all day long. For more information look under Settings Mneu>>Elizaibots
Version: v1.0.2
Author: Elizabeth Perreau
Author URI: http://www.elizaibeth.com

=== RELEASE NOTES ===
2013-09-13 - v1.0 - first version
License: GPL2 */
/* Copyright 2013 Elizabeth Perreau (email : elizaibeth@elizaibeth.com)
 This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License, version 2, as published by the Free Software Foundation.
 This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 See the GNU General Public License for more details.
 You should have received a copy of the GNU General Public License along with this program;
 if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA */

define("ELIZAIBOT_PLUGIN_DIR", __file__);
define("ELIZAIBOT_PLUGIN_BASE", dirname(__file__));
define("ELIZAIBOT_PLUGIN_URL", plugin_dir_url(ELIZAIBOT_PLUGIN_DIR));

define("ELIZAIBOT_PLUGIN_JS_DIR", ELIZAIBOT_PLUGIN_URL."js/");
define("ELIZAIBOT_PLUGIN_LIB_DIR", ELIZAIBOT_PLUGIN_BASE . "/lib/");
define("ELIZAIBOT_PLUGIN_CSS_DIR", ELIZAIBOT_PLUGIN_URL . "styles/");
define("ELIZAIBOT_CONVERSATION", "ELIZAIBOT_CONVERSATION");
define("ELIZAIBOT_ID", "ELIZAIBOT_ID");

include_once(ELIZAIBOT_PLUGIN_LIB_DIR . '/elizaibot_functions.php');

add_action('init', 'register_elizaibot_shortcodes');
add_action('admin_menu', 'elizaibot_admin_menu');
add_action('wp_enqueue_scripts', 'elizaibot_loadScripts');
add_action('init', 'elizaibots_convo_id_init');

function elizaibots_convo_id_init(){
  define("ELIZAIBOTID", elizaibot_create_convo_id());
}
?>
