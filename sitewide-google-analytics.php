<?php

class Msw_Google_Analytics {
	
	public static $PLUGIN_NAME = 'Sitewide Google Analytics';
	public static $PLUGIN_KEY = 'sitewide-google-analytics';
	public static $ID_KEY = 'msw-google-analytics-id';
	public static $DOMAIN_KEY = 'msw-google-analytics-domain';
	public static $ENABLED_KEY = 'msw-google-analytics-enabled';
	
	public static function output_analytics() {
		
		$id = get_option( self::$ID_KEY, false );
		$domain = get_option( self::$DOMAIN_KEY, false );
		$enabled = get_option( self::$ENABLED_KEY, false );
		
		if ( $id && $domain && $enabled ) {
			self::render_template( 'output-analytics', array(
				self::$ID_KEY        => $id,
				self::$DOMAIN_KEY    => $domain,
				self::$ENABLED_KEY   => $enabled
			) );
		}
		
	}
	
	public static function create_analytics_menu() {
        if ( is_multisite() ) {
            $capability = 'manage_network';
            $slug = 'settings.php';
        } else {
            $capability = 'activate_plugins';
            $slug = 'options-general.php';
        }
		add_submenu_page( $slug, self::$PLUGIN_NAME, self::$PLUGIN_NAME,
				$capability, self::$PLUGIN_KEY, 'Msw_Google_Analytics::output_analytics_form');
	}
	
	public static function output_analytics_form() {
		
		$data = array(
			self::$ID_KEY        => get_option( self::$ID_KEY, '' ),
			self::$DOMAIN_KEY    => get_option( self::$DOMAIN_KEY, '' ),
			self::$ENABLED_KEY   => get_option( self::$ENABLED_KEY, false )
		);
		
		if ( isset( $_POST[ 'submit' ] ) ) {
			
			$data[self::$ID_KEY] = self::purify( $_POST[self::$ID_KEY] );
			$data[self::$DOMAIN_KEY] = self::purify( $_POST[self::$DOMAIN_KEY] );
			$data[self::$ENABLED_KEY] = ( $_POST[self::$ENABLED_KEY] === 'on' ? true : false );
			
			update_option( self::$ID_KEY, $data[self::$ID_KEY] );
			update_option( self::$DOMAIN_KEY, $data[self::$DOMAIN_KEY] );
			update_option( self::$ENABLED_KEY, $data[self::$ENABLED_KEY] );
			
			$data['saved'] = true;
		
		}
		
		Msw_Util::render_template( 'analytics-form', $data);
		
	}
	
	private static function purify( $str ) {
		return preg_replace( '/[^A-Za-z0-9\-\_\.]/', '', $str );
	}

	private static function render_template( $name, $data ) {
		$view_folder = str_replace( '_', '-', strToLower( $class ) );
		$path = join( DIRECTORY_SEPARATOR, array(
            dirname(__FILE__), 'templates', $name . '.php' )
        );
        include( $path );
	}

}

add_action( 'wp_print_footer_scripts', 'Msw_Google_Analytics::output_analytics' );
if ( is_multisite() ) {
    add_action( 'network_admin_menu', 'Msw_Google_Analytics::create_analytics_menu' );
} else {
    add_action( 'admin_menu', 'Msw_Google_Analytics::create_analytics_menu' );
}

