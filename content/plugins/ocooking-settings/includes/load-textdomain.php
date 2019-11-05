<?php

 add_action( 'plugins_loaded', 'ocooking_settings_load_plugin_textdomain' );

 function ocooking_settings_load_plugin_textdomain()
 {
     load_plugin_textdomain(
         OCOOKING_PLUGIN_TEXT_DOMAIN,
         false,
         dirname(
             plugin_basename( OCOOKING_PLUGIN_PATH )
         ) . '/languages'
     );
 }