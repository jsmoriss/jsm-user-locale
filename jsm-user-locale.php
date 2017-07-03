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
 * Description: Add a quick and easy user locale / language selector in the WordPress admin back-end and front-end toolbar menus. 
 * Requires At Least: 4.7
 * Tested Up To: 4.8
 * Version: 1.2.2
 *
 * Version Numbering: {major}.{minor}.{bugfix}[-{stage}.{level}]
 *
 *	{major}		Major structural code changes / re-writes or incompatible API changes.
 *	{minor}		New functionality was added or improved in a backwards-compatible manner.
 *	{bugfix}	Backwards-compatible bug fixes or small improvements.
 *	{stage}.{level}	Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).
 *
 * Copyright 2016-2017 Jean-Sebastien Morisset (https://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'These aren\'t the droids you\'re looking for...' );
}

if ( ! class_exists( 'JSM_User_Locale' ) ) {

	class JSM_User_Locale {

		private static $instance;

		private static $dashicons = array(
			100 => 'admin-appearance',
			101 => 'admin-comments',
			102 => 'admin-home',
			103 => 'admin-links',
			104 => 'admin-media',
			105 => 'admin-page',
			106 => 'admin-plugins',
			107 => 'admin-tools',
			108 => 'admin-settings',
			109 => 'admin-post',
			110 => 'admin-users',
			111 => 'admin-generic',
			112 => 'admin-network',
			115 => 'welcome-view-site',
			116 => 'welcome-widgets-menus',
			117 => 'welcome-comments',
			118 => 'welcome-learn-more',
			119 => 'welcome-write-blog',
			120 => 'wordpress',
			122 => 'format-quote',
			123 => 'format-aside',
			125 => 'format-chat',
			126 => 'format-video',
			127 => 'format-audio',
			128 => 'format-image',
			130 => 'format-status',
			132 => 'plus',
			133 => 'welcome-add-page',
			134 => 'align-center',
			135 => 'align-left',
			136 => 'align-right',
			138 => 'align-none',
			139 => 'arrow-right',
			140 => 'arrow-down',
			141 => 'arrow-left',
			142 => 'arrow-up',
			145 => 'calendar',
			147 => 'yes',
			148 => 'admin-collapse',
			153 => 'dismiss',
			154 => 'star-empty',
			155 => 'star-filled',
			156 => 'sort',
			157 => 'pressthis',
			158 => 'no',
			159 => 'marker',
			160 => 'lock',
			161 => 'format-gallery',
			163 => 'list-view',
			164 => 'exerpt-view',
			165 => 'image-crop',
			166 => 'image-rotate-left',
			167 => 'image-rotate-right',
			168 => 'image-flip-vertical',
			169 => 'image-flip-horizontal',
			171 => 'undo',
			172 => 'redo',
			173 => 'post-status',
			174 => 'cart',
			175 => 'feedback',
			176 => 'cloud',
			177 => 'visibility',
			178 => 'vault',
			179 => 'search',
			180 => 'screenoptions',
			181 => 'slides',
			182 => 'trash',
			183 => 'analytics',
			184 => 'chart-pie',
			185 => 'chart-bar',
			200 => 'editor-bold',
			201 => 'editor-italic',
			203 => 'editor-ul',
			204 => 'editor-ol',
			205 => 'editor-quote',
			206 => 'editor-alignleft',
			207 => 'editor-aligncenter',
			208 => 'editor-alignright',
			209 => 'editor-insertmore',
			210 => 'editor-spellcheck',
			211 => 'editor-distractionfree',
			212 => 'editor-kitchensink',
			213 => 'editor-underline',
			214 => 'editor-justify',
			215 => 'editor-textcolor',
			216 => 'editor-paste-word',
			217 => 'editor-paste-text',
			218 => 'editor-removeformatting',
			219 => 'editor-video',
			220 => 'editor-customchar',
			221 => 'editor-outdent',
			222 => 'editor-indent',
			223 => 'editor-help',
			224 => 'editor-strikethrough',
			225 => 'editor-unlink',
			226 => 'dashboard',
			227 => 'flag',
			229 => 'leftright',
			230 => 'location',
			231 => 'location-alt',
			232 => 'images-alt',
			233 => 'images-alt2',
			234 => 'video-alt',
			235 => 'video-alt2',
			236 => 'video-alt3',
			237 => 'share',
			238 => 'chart-line',
			239 => 'chart-area',
			240 => 'share-alt',
			242 => 'share-alt2',
			301 => 'twitter',
			303 => 'rss',
			304 => 'facebook',
			305 => 'facebook-alt',
			306 => 'camera',
			307 => 'groups',
			308 => 'hammer',
			309 => 'art',
			310 => 'migrate',
			311 => 'performance',
			312 => 'products',
			313 => 'awards',
			314 => 'forms',
			316 => 'download',
			317 => 'upload',
			318 => 'category',
			319 => 'admin-site',
			320 => 'editor-rtl',
			321 => 'backup',
			322 => 'portfolio',
			323 => 'tag',
			324 => 'wordpress-alt',
			325 => 'networking',
			326 => 'translation',
			328 => 'smiley',
			330 => 'book',
			331 => 'book-alt',
			332 => 'shield',
			333 => 'menu',
			334 => 'shield-alt',
			335 => 'no-alt',
			336 => 'id',
			337 => 'id-alt',
			338 => 'businessman',
			339 => 'lightbulb',
			340 => 'arrow-left-alt',
			341 => 'arrow-left-alt2',
			342 => 'arrow-up-alt',
			343 => 'arrow-up-alt2',
			344 => 'arrow-right-alt',
			345 => 'arrow-right-alt2',
			346 => 'arrow-down-alt',
			347 => 'arrow-down-alt2',
			348 => 'info',
			459 => 'star-half',
			460 => 'minus',
			462 => 'googleplus',
			463 => 'update',
			464 => 'edit',
			465 => 'email',
			466 => 'email-alt',
			468 => 'sos',
			469 => 'clock',
			470 => 'smartphone',
			471 => 'tablet',
			472 => 'desktop',
			473 => 'testimonial',
		);

		public function __construct() {
			$is_admin = is_admin();
			$on_front = apply_filters( 'jsm_user_locale_front_end', true );

			if ( ! $is_admin && $on_front )	// apply user locale value to front-end
				add_filter( 'locale', array( __CLASS__, 'get_user_locale' ) );

			if ( $is_admin || $on_front ) {
				add_action( 'plugins_loaded', array( __CLASS__, 'load_textdomain' ) );
				add_action( 'admin_init', array( __CLASS__, 'check_wp_version' ) );
				add_action( 'wp_before_admin_bar_render', array( __CLASS__, 'add_locale_toolbar' ) );

				if ( isset( $_GET['update-user-locale'] ) )	// new user locale value selected
					add_action( 'init', array( __CLASS__, 'update_user_locale' ), -100 );
			}
		}

		public static function &get_instance() {
			if ( ! isset( self::$instance ) )
				self::$instance = new self;
			return self::$instance;
		}

		public static function load_textdomain() {
			load_plugin_textdomain( 'jsm-user-locale', false, 'jsm-user-locale/languages/' );
		}

		public static function check_wp_version() {
			global $wp_version;
			$wp_min_version = 4.7;

			if ( version_compare( $wp_version, $wp_min_version, '<' ) ) {
				$plugin = plugin_basename( __FILE__ );
				if ( is_plugin_active( $plugin ) ) {
					self::load_textdomain();
					if ( ! function_exists( 'deactivate_plugins' ) ) {
						require_once trailingslashit( ABSPATH ).'wp-admin/includes/plugin.php';
					}
					$plugin_data = get_plugin_data( __FILE__, false );	// $markup = false
					deactivate_plugins( $plugin, true );	// $silent = true
					wp_die( 
						'<p>'.sprintf( __( '%1$s requires %2$s version %3$s or higher and has been deactivated.',
							'jsm-user-locale' ), $plugin_data['Name'], 'WordPress', $wp_min_version ).'</p>'.
						'<p>'.sprintf( __( 'Please upgrade %1$s before trying to re-activate the %2$s plugin.',
							'jsm-user-locale' ), 'WordPress', $plugin_data['Name'] ).'</p>'
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
			 * Use Polylang URLs
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
			require_once trailingslashit( ABSPATH ).'wp-admin/includes/translation-install.php';
			$translations = wp_get_available_translations();	// since wp 4.0
			$languages = array_merge( array( 'site-default' ), get_available_languages() );	// since wp 3.0
			$user_locale = get_user_meta( $user_id, 'locale', true );

			if ( empty( $user_locale ) )
				$user_locale = 'site-default';

			$menu_locale = $user_locale === 'site-default' ? 
				__( 'default', 'jsm-user-locale' ) : $user_locale;

			/*
			 * Menu Icon and Title
			 */
			$dashicon = apply_filters( 'jsm_user_locale_menu_dashicon', 326, $menu_locale );

			if ( ! empty( $dashicon ) && $dashicon !== 'none' ) {
				if ( isset( self::$dashicons[$dashicon] ) ) {		// just in case
					$menu_icon = '<span class="ab-icon dashicons-'.self::$dashicons[$dashicon].'"></span>';
				} else $menu_icon = '';
			} else $menu_icon = '';

			$menu_title = apply_filters( 'jsm_user_locale_menu_title', '%s', $menu_locale );
			$menu_title = sprintf( $menu_title, $menu_locale );

			$wp_admin_bar->add_node( array(	// since wp 3.1
				'id' => 'jsm-user-locale',
				'title' => $menu_icon.$menu_title,
				'parent' => false,
				'href' => false,
				'group' => false,
				'meta' => false,
			) );

			/*
			 * Menu Drop-down Items
			 */
			$menu_items = array();
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
			$menu_items = apply_filters( 'jsm_user_locale_menu_items', $menu_items, $menu_locale );

			foreach ( $menu_items as $menu_item )
				$wp_admin_bar->add_node( $menu_item );
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
