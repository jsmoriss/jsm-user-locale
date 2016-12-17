<?php
/*
 * Plugin Name: JSM's User Locale
 * Text Domain: jsm-user-locale
 * Domain Path: /languages
 * Plugin URI: http://surniaulula.com/extend/plugins/jsm-user-locale/
 * Assets URI: https://jsmoriss.github.io/jsm-user-locale/assets/
 * Author: JS Morisset
 * Author URI: http://surniaulula.com/
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Description: Add a quick & easy locale / language selector for users in the WordPress admin back-end and front-end toolbar menus. 
 * Requires At Least: 4.7
 * Tested Up To: 4.7
 * Version: 1.0.0-1
 *
 * Version Components: {major}.{minor}.{bugfix}-{stage}{level}
 *
 *	{major}		Major code changes / re-writes or significant feature changes.
 *	{minor}		New features / options were added or improved.
 *	{bugfix}	Bugfixes or minor improvements.
 *	{stage}{level}	dev < a (alpha) < b (beta) < rc (release candidate) < # (production).
 *
 * See PHP's version_compare() documentation at http://php.net/manual/en/function.version-compare.php.
 * 
 * This script is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 3 of the License, or (at your option) any later
 * version.
 * 
 * This script is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU General Public License for more details at
 * http://www.gnu.org/licenses/.
 * 
 * Copyright 2012-2016 Jean-Sebastien Morisset (http://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'JSM_User_Locale' ) ) {

	class JSM_User_Locale {

		protected static $instance = null;

		public static function &get_instance() {
			if ( self::$instance === null )
				self::$instance = new self;
			return self::$instance;
		}

		public function __construct() {
			$is_admin = is_admin();
			$on_front = apply_filters( 'jsm_user_locale_front_end', true );	// apply user locale on front-end

			if ( ! $is_admin && $on_front )
				add_filter( 'locale', array( __CLASS__, 'get_user_locale' ) );

			if ( $is_admin || $on_front ) {
				load_plugin_textdomain( 'jsm-user-locale', false, 'jsm-user-locale/languages/' );

				add_action( 'wp_before_admin_bar_render', array( __CLASS__, 'add_locale_toolbar' ) );

				if ( isset( $_GET['update-user-locale'] ) )
					add_action( 'init', array( __CLASS__, 'update_user_locale' ) );
			}
		}

		public static function get_user_locale( $locale ) {
			if ( $user_id = get_current_user_id() )	{
				if ( $user_locale = get_user_meta( $user_id, 'locale', true ) ) {
					return $user_locale;
				}
			}
			return $locale;
		}

		public static function update_user_locale() {
			if ( isset( $_GET['update-user-locale'] ) ) {
				$locale = sanitize_text_field( $_GET['update-user-locale'] );
			} else return;

			if ( $user_id = get_current_user_id() ) {
				if ( $locale === 'site-default' )
					delete_user_meta( $user_id, 'locale' );
				else update_user_meta( $user_id, 'locale', $locale );
			}

			wp_redirect( remove_query_arg( 'update-user-locale' ) );	// reload the current page
			exit;
		}

		public static function add_locale_toolbar() {
			if ( ! $user_id = get_current_user_id() )
				return;

			global $wp_admin_bar;
			$wp_admin_bar->add_node( array(	// since wp 3.1
				'id' => 'jsm-user-locale',
				'title' => __( 'Select Locale', 'jsm-user-locale' ),
				'parent' => false,
				'href' => false,
				'group' => false,
				'meta' => false,
			) );

			require_once( ABSPATH . 'wp-admin/includes/translation-install.php' );
			$translations = wp_get_available_translations();	// since wp 4.0
			$languages = array_merge( array( 'site-default' ), get_available_languages() );	// since wp 3.0
			$user_locale = get_user_meta( $user_id, 'locale', true );

			foreach ( $languages as $locale ) {
				$meta = array();
				if ( isset( $translations[$locale]['native_name'] ) ) {
					$native_name = $translations[$locale]['native_name'];
				} elseif ( $locale === 'en_US' ) {
					$native_name = 'English (United States)';
				} elseif ( $locale === 'site-default' ) {
					$native_name = __( 'Default Locale', 'jsm-user-locale' );
				} else {
					$native_name = $locale;
				}
				if ( ( empty( $user_locale ) && $locale === 'site-default' ) || $locale === $user_locale ) {
					$native_name = '<strong>'.$native_name.'</strong>';
					$meta['class'] = 'current_locale';
				}
				$wp_admin_bar->add_node( array(	// since wp 3.1
					'id' => 'jsm-user-locale-'.$locale,
					'title' => $native_name,
					'parent' => 'jsm-user-locale',
					'href' => add_query_arg( 'update-user-locale', rawurlencode( $locale ) ),
					'group' => false,
					'meta' => $meta,
				) );
			}
		}
	}

	JSM_User_Locale::get_instance();
}

?>
