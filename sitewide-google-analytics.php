<?php
/*
Plugin Name: Sitewide Google Analytics 
Plugin URI: https://github.com/weberwithoneb/sitewide-google-analytics
Description: Installs the same Google Analytics code across all sites.
Version: 0
Author: Mike Weber (weberwithoneb)
Author URI: https://github.com/weberwithoneb
License: GPL2
*/
/*  Copyright 2012  Mike Weber  (email : msweber@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


class Sitewide_Google_Analytics {
	
	public static $PLUGIN_NAME = 'Sitewide Google Analytics';
	public static $PLUGIN_KEY = 'sitewide-google-analytics';
	public static $ID_KEY = 'msw-google-analytics-id';
	public static $DOMAIN_KEY = 'msw-google-analytics-domain';
	public static $ENABLED_KEY = 'msw-google-analytics-enabled';
	
	public static function output_analytics() {
		
		$id = get_site_option( self::$ID_KEY, false );
		$domain = get_site_option( self::$DOMAIN_KEY, false );
		$enabled = get_site_option( self::$ENABLED_KEY, false );
		
		if ( isset( $id ) && !empty( $id ) && $enabled ) {
			self::render_template( 'output-analytics', array(
				self::$ID_KEY		=> $id,
				self::$DOMAIN_KEY	=> $domain,
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
				$capability, self::$PLUGIN_KEY, 'Sitewide_Google_Analytics::output_analytics_form');
	}
	
	public static function output_analytics_form() {
		
		$data = array(
			self::$ID_KEY		=> get_site_option( self::$ID_KEY, '' ),
			self::$DOMAIN_KEY	=> get_site_option( self::$DOMAIN_KEY, '' ),
			self::$ENABLED_KEY 	=> get_site_option( self::$ENABLED_KEY, false )
		);
		
		if ( isset( $_POST[ 'Save' ] ) ) {
			
			$data[self::$ID_KEY] = self::purify( $_POST[self::$ID_KEY] );
			$data[self::$DOMAIN_KEY] = self::purify( $_POST[self::$DOMAIN_KEY] );
			$data[self::$ENABLED_KEY] = ( $_POST[self::$ENABLED_KEY] === 'on' ? true : false );
			
			update_site_option( self::$ID_KEY, $data[self::$ID_KEY] );
			update_site_option( self::$DOMAIN_KEY, $data[self::$DOMAIN_KEY] );
			update_site_option( self::$ENABLED_KEY, $data[self::$ENABLED_KEY] );
			
			$data['saved'] = true;
		
		}
		
		self::render_template( 'analytics-form', $data);
		
	}
	
	private static function purify( $str ) {
		return preg_replace( '/[^A-Za-z0-9\-\_\.]/', '', $str );
	}

	private static function render_template( $name, $data ) {
		$path = join( DIRECTORY_SEPARATOR, array(
			dirname(__FILE__), 'templates', $name . '.php' )
		);
		include( $path );
	}

}

add_action( 'wp_print_footer_scripts', 'Sitewide_Google_Analytics::output_analytics' );
if ( is_multisite() ) {
	add_action( 'network_admin_menu', 'Sitewide_Google_Analytics::create_analytics_menu' );
} else {
	add_action( 'admin_menu', 'Sitewide_Google_Analytics::create_analytics_menu' );
}
