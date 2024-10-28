<?php
/*
 * Plugin Name: JSM User Locale Selector
 * Text Domain: jsm-user-locale
 * Domain Path: /languages
 * Plugin URI: https://surniaulula.com/extend/plugins/jsm-user-locale/
 * Assets URI: https://jsmoriss.github.io/jsm-user-locale/assets/
 * Author: JS Morisset
 * Author URI: https://surniaulula.com/
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl.txt
 * Description: Add a quick and easy user locale / language selector in the WordPress admin back-end and front-end toolbar menus.
 * Requires PHP: 7.4.33
 * Requires At Least: 5.9
 * Tested Up To: 6.7.0
 * Version: 2.2.1
 *
 * Version Numbering: {major}.{minor}.{bugfix}[-{stage}.{level}]
 *
 *      {major}         Major structural code changes and/or incompatible API changes (ie. breaking changes).
 *      {minor}         New functionality was added or improved in a backwards-compatible manner.
 *      {bugfix}        Backwards-compatible bug fixes or small improvements.
 *      {stage}.{level} Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).
 *
 * Copyright 2016-2024 Jean-Sebastien Morisset (https://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) {

	die( 'These aren\'t the droids you\'re looking for.' );
}

if ( ! class_exists( 'JsmUserLocale' ) ) {

	class JsmUserLocale {

		private $dashicons = array(
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

		private static $instance = null;	// JsmUserLocale class object.

		public function __construct() {

			$doing_ajax = defined( 'DOING_AJAX' ) ? DOING_AJAX : false;
			$doing_cron = defined( 'DOING_CRON' ) ? DOING_CRON : false;

			if ( ! $doing_ajax && ! $doing_cron ) {

				add_action( 'init', array( $this, 'init_plugin' ), -1000, 0 );
			}
		}

		public static function &get_instance() {

			if ( null === self::$instance ) {

				self::$instance = new self;
			}

			return self::$instance;
		}

		public function init_plugin() {

			$user_id       = get_current_user_id();
			$is_admin      = is_admin();
			$show_on_front = apply_filters( 'jsm_user_locale_front_end', true );

			if ( $user_id ) {

				if ( ! $is_admin && $show_on_front ) {	// Apply user locale value to front-end.

					$locale      = get_locale();
					$user_locale = get_metadata( 'user', $user_id, 'locale', $single = true );

					if ( $locale !== $user_locale ) {

						switch_to_locale( $user_locale );	// Switches to locale if the WP language is installed.
					}
				}

				if ( $is_admin || $show_on_front ) {

					add_action( 'plugins_loaded', array( $this, 'init_textdomain' ) );
					add_action( 'admin_bar_menu', array( $this, 'add_admin_bar_menu' ), 60, 1 );

					if ( isset( $_GET[ 'update-user-locale' ] ) ) {

						add_action( 'init', array( $this, 'update_user_locale' ), -10, 0 );
					}
				}
			}
		}

		public function init_textdomain() {

			load_plugin_textdomain( 'jsm-user-locale', false, 'jsm-user-locale/languages/' );
		}

		public function update_user_locale() {

			$is_admin = is_admin();

			if ( isset( $_GET[ 'update-user-locale' ] ) ) {

				$user_locale = sanitize_text_field( $_GET[ 'update-user-locale' ] );

			} else {

				return;
			}

			$url = remove_query_arg( 'update-user-locale' );

			if ( $user_id = get_current_user_id() ) {

				if ( 'site-default' === $user_locale ) {

					delete_metadata( 'user', $user_id, 'locale' );

				} else {

					update_metadata( 'user', $user_id, 'locale', $user_locale );
				}
			}

			if ( 'site-default' === $user_locale ) {

				$user_locale = $this->get_default_locale();
			}

			/*
			 * Use Polylang URLs.
			 */
			if ( ! $is_admin && function_exists( 'pll_the_languages' ) ) {

				$pll_languages  = pll_the_languages( array( 'echo' => 0, 'raw' => 1 ) );
				$pll_def_locale = pll_default_language( 'locale' );
				$pll_urls       = array();	// Associative array of locales and their url.

				foreach ( $pll_languages as $pll_lang ) {

					if ( ! empty( $pll_lang[ 'locale' ] ) && ! empty( $pll_lang[ 'url' ] ) ) {

						$pll_locale = str_replace( '-', '_', $pll_lang[ 'locale' ] );	// wp compatibility

						$pll_urls[ $pll_locale ] = $pll_lang[ 'url' ];
					}
				}

				if ( isset( $pll_urls[ $user_locale ] ) ) {

					$url = $pll_urls[ $user_locale ];

				} elseif ( isset( $pll_urls[ $pll_def_locale ] ) ) {

					$url = $pll_urls[ $pll_def_locale ];
				}
			}

			wp_redirect( apply_filters( 'jsm_user_locale_redirect_url', $url, $user_locale ) );

			exit;
		}

		public function add_admin_bar_menu( $wp_admin_bar ) {

			if ( ! $user_id = get_current_user_id() ) {	// Just in case.

				return;
			}

			require_once trailingslashit( ABSPATH ) . 'wp-admin/includes/translation-install.php';

			$translations  = wp_get_available_translations();
			$avail_locales = get_available_languages();
			$user_locale   = get_metadata( 'user', $user_id, 'locale', $single = true );
			$locale_names  = array( 'site-default' => _x( 'Default', 'toolbar menu item', 'jsm-user-locale' ) );

			foreach ( $avail_locales as $locale ) {

				if ( isset( $translations[ $locale ][ 'native_name' ] ) ) {

					$native_name = $translations[ $locale ][ 'native_name' ];

				} elseif ( 'en_US' === $locale ) {

					$native_name = 'English (United States)';

				} else {

					$native_name = $locale;
				}

				$locale_names[ $locale ] = $native_name;
			}

			if ( empty( $user_locale ) ) {

				$user_locale = 'site-default';
			}

			/*
			 * Menu icon and title.
			 */
			$def_menu_title = empty( $locale_names[ $user_locale ] ) ? $user_locale : $locale_names[ $user_locale ];
			$menu_dashicon  = apply_filters( 'jsm_user_locale_menu_dashicon', 326, $user_locale );
			$menu_icon_html = '';

			if ( ! empty( $menu_dashicon ) && $menu_dashicon !== 'none' && isset( $this->dashicons[ $menu_dashicon ] ) ) {

				$menu_icon_html = '<span class="ab-icon dashicons-' . $this->dashicons[ $menu_dashicon ] . '"></span>';
			}

			$menu_title_html = apply_filters( 'jsm_user_locale_menu_title', '%s', $user_locale );
			$menu_title_html = sprintf( $menu_title_html, $def_menu_title );

			$wp_admin_bar->add_node( array(
				'id'     => 'jsm-user-locale',
				'title'  => $menu_icon_html . $menu_title_html,
				'parent' => false,
				'href'   => false,
				'group'  => false,
				'meta'   => false,
			) );

			/*
			 * Menu drop-down items.
			 */
			$menu_items = array();

			foreach ( $locale_names as $locale => $native_name ) {

				$meta = array();

				if ( $locale === $user_locale ) {

					$native_name = '<strong>' . $native_name . '</strong>';

					$meta[ 'class' ] = 'current_locale';
				}

				$wp_admin_bar->add_node( array(
					'id'     => 'jsm-user-locale-' . $locale,
					'title'  => $native_name,
					'parent' => 'jsm-user-locale',
					'href'   => add_query_arg( 'update-user-locale', rawurlencode( $locale ) ),
					'group'  => false,
					'meta'   => $meta,
				) );
			}

			$menu_items = apply_filters( 'jsm_user_locale_menu_items', $menu_items, $user_locale );

			foreach ( $menu_items as $menu_item ) {

				$wp_admin_bar->add_node( $menu_item );
			}
		}

		private function get_default_locale() {

			global $wp_local_package;

			if ( isset( $wp_local_package ) ) {

	      			$locale = $wp_local_package;
			}

			if ( defined( 'WPLANG' ) ) {

				$locale = WPLANG;
			}

			if ( is_multisite() ) {

				if ( ( $ms_locale = get_option( 'WPLANG' ) ) === false ) {

					$ms_locale = get_site_option( 'WPLANG' );
				}

				if ( false !== $ms_locale ) {

					$locale = $ms_locale;
				}

			} else {

				$db_locale = get_option( 'WPLANG' );

				if ( false !== $db_locale ) {

					$locale = $db_locale;
				}
			}

			if ( empty( $locale ) ) {

				$locale = 'en_US';	// Just in case.
			}

			return $locale;
		}
	}

	JsmUserLocale::get_instance();
}
