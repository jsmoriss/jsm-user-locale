<?php
/*
 * Plugin Name: JSM's User Locale
 * Text Domain: jsm-user-locale
 * Domain Path: /languages
 * Plugin URI: https://surniaulula.com/extend/plugins/jsm-user-locale/
 * Assets URI: https://jsmoriss.github.io/jsm-user-locale/assets/
 * Author: JS Morisset
 * Author URI: https://surniaulula.com/
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Description: Add a quick & easy locale / language selector for users in the WordPress admin back-end and front-end toolbar menus. 
 * Requires At Least: 4.7
 * Tested Up To: 4.7
 * Version: 1.1.3-1
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
 * Copyright 2012-2016 Jean-Sebastien Morisset (https://surniaulula.com/)
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

				add_action( 'admin_init', array( __CLASS__, 'check_wp_version' ) );
				add_action( 'wp_before_admin_bar_render', array( __CLASS__, 'add_locale_toolbar' ) );

				if ( isset( $_GET['update-user-locale'] ) )
					add_action( 'init', array( __CLASS__, 'update_user_locale' ) );
			}
		}

		public static function check_wp_version() {
			global $wp_version;
			$min_version = 4.7;
			if ( version_compare( $wp_version, $min_version, '<' ) ) {
				$plugin = plugin_basename( __FILE__ );
				if ( is_plugin_active( $plugin ) ) {
					require_once( ABSPATH.'wp-admin/includes/plugin.php' );	// just in case
					$plugin_data = get_plugin_data( __FILE__, false );	// $markup = false
					deactivate_plugins( $plugin );
					wp_die( 
						sprintf( __( '%1$s requires WordPress version %2$s or higher and has been deactivated.',
							'jsm-user-locale' ), $plugin_data['Name'], $min_version ).'<br/><br/>'.
						sprintf( __( 'Please upgrade WordPress before trying to reactivate the %1$s plugin.',
							'jsm-user-locale' ), $plugin_data['Name'] )
					);
				}
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
			$is_admin = is_admin();

			if ( isset( $_GET['update-user-locale'] ) ) {
				$user_locale = sanitize_text_field( $_GET['update-user-locale'] );
			} else return;

			$url = remove_query_arg( 'update-user-locale' );

			if ( $user_id = get_current_user_id() ) {
				if ( $user_locale === 'site-default' )
					delete_user_meta( $user_id, 'locale' );
				else update_user_meta( $user_id, 'locale', $user_locale );
			}

			if ( $user_locale === 'site-default' )
				$user_locale = self::get_default_locale();

			/*
			 * Redirect to Polylang URLs
			 */
			if ( ! $is_admin && function_exists( 'pll_the_languages' ) ) {

				$pll_languages = pll_the_languages( array( 'echo' => 0, 'raw' => 1 ) );
				$pll_def_locale = pll_default_language( 'locale' );
				$pll_urls = array();	// associative array of locales and their url

				foreach ( $pll_languages as $pll_lang ) {
					if ( ! empty( $pll_lang['locale'] ) && ! empty( $pll_lang['url'] ) ) {
						$pll_locale = str_replace( '-', '_', $pll_lang['locale'] );	// wp compatibility
						$pll_urls[$pll_locale] = $pll_lang['url'];
					}
				}

				if ( isset( $pll_urls[$user_locale] ) )
					$url = $pll_urls[$user_locale];
				elseif ( isset( $pll_urls[$pll_def_locale] ) )
					$url = $pll_urls[$pll_def_locale];
			}

			wp_redirect( apply_filters( 'jsm_user_locale_redirect_url', $url, $user_locale ) );

			exit;
		}

		public static function add_locale_toolbar() {
			if ( ! $user_id = get_current_user_id() )
				return;

			global $wp_admin_bar;
			require_once( ABSPATH.'wp-admin/includes/translation-install.php' );
			$translations = wp_get_available_translations();	// since wp 4.0
			$languages = array_merge( array( 'site-default' ), get_available_languages() );	// since wp 3.0
			$user_locale = get_user_meta( $user_id, 'locale', true );

			if ( empty( $user_locale ) )
				$user_locale = 'site-default';

			$menu_locale = $user_locale === 'site-default' ? 
				__( 'default', 'jsm-user-locale' ) : $user_locale;

			$menu_title = apply_filters( 'jsm_user_locale_menu_title',
				sprintf( __( 'User Locale (%s)', 'jsm-user-locale' ),
					$menu_locale ), $user_locale );

			$wp_admin_bar->add_node( array(	// since wp 3.1
				'id' => 'jsm-user-locale',
				'title' => $menu_title,
				'parent' => false,
				'href' => false,
				'group' => false,
				'meta' => false,
			) );

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
				if ( $locale === $user_locale ) {
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

		private static function get_default_locale() {
			global $wp_local_package;
			if ( isset( $wp_local_package ) )
	      			$locale = $wp_local_package;
			if ( defined( 'WPLANG' ) )
				$locale = WPLANG;
			if ( is_multisite() ) {
				if ( ( $ms_locale = get_option( 'WPLANG' ) ) === false )
					$ms_locale = get_site_option( 'WPLANG' );
				if ( $ms_locale !== false )
					$locale = $ms_locale;
			} else {
				$db_locale = get_option( 'WPLANG' );
				if ( $db_locale !== false )
					$locale = $db_locale;
			}
			if ( empty( $locale ) )
				$locale = 'en_US';      // just in case
			return $locale;
		}
	}

	JSM_User_Locale::get_instance();
}

?>
