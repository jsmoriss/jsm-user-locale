=== JSM's User Locale for the WordPress Toolbar ===
Plugin Name: JSM's User Locale
Plugin Slug: jsm-user-locale
Text Domain: jsm-user-locale
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Assets URI: https://jsmoriss.github.io/jsm-user-locale/assets/
Tags: user, locale, language, select, admin, back-end, front-end, polylang
Contributors: jsmoriss
Requires At Least: 4.7
Tested Up To: 4.7.3
Stable Tag: 1.2.0-1

Add a quick and easy user locale / language selector in the WordPress admin back-end and front-end toolbar menus.

== Description ==

<strong>Add a user locale drop-down menu item in the WordPress admin back-end admin and front-end toolbar menus.</strong>

<strong>Perfect for translators or anyone who needs to switch languages quickly and easily</strong> &mdash; allows logged-in users to change their preferred locale / language setting right from the toolbar menu (instead of having to update their WordPress user profile page).

The default WordPress behavior is to apply the user locale preference to the admin back-end only &mdash; this plugin extends the user locale / language preference to the front-end webpage as well.

<blockquote>
<p>There are no plugin settings &mdash; simply install and activate the plugin.</p>
</blockquote>

= Power-Users / Developers =

See the plugin [Other Notes](https://wordpress.org/plugins/jsm-user-locale/other_notes/) page for information on available filters.

= Do you use the Polylang plugin? =

If the Polylang plugin is active, the user locale menu will automatically use the correct Polylang language URLs for the current webpage.

= Do you use the WPSSO plugin? =

If you're using the [WordPress Social Sharing Optimization (WPSSO)](https://wordpress.org/plugins/wpsso/) plugin, the [WPSSO User Locale (WPSSO UL)](https://wordpress.org/plugins/wpsso-user-locale/) extension offers the same functionality, with the addition of a settings page to modify the menu icon, menu title, and enable/disable the user locale menu on the front-end.

== Installation ==

= Automated Install =

1. Go to the wp-admin/ section of your website.
1. Select the *Plugins* menu item.
1. Select the *Add New* sub-menu item.
1. In the *Search* box, enter the plugin name.
1. Click the *Search Plugins* button.
1. Click the *Install Now* link for the plugin.
1. Click the *Activate Plugin* link.

= Semi-Automated Install =

1. Download the plugin archive file.
1. Go to the wp-admin/ section of your website.
1. Select the *Plugins* menu item.
1. Select the *Add New* sub-menu item.
1. Click on *Upload* link (just under the Install Plugins page title).
1. Click the *Browse...* button.
1. Navigate your local folders / directories and choose the zip file you downloaded previously.
1. Click on the *Install Now* button.
1. Click the *Activate Plugin* link.

== Frequently Asked Questions ==

= Frequently Asked Questions =

* None

== Other Notes ==

= Additional Documentation =

**Developer Filters**

To exclude the user locale menu item from the front-end toolbar menu, *and ignore the user locale / language preference in the front-end webpage*, add the following filter hook to your functions.php file:

`
add_filter( 'jsm_user_locale_front_end', '__return_false' );
`

To modify the user locale menu title (default is "%s"), you can hook the 'jsm_user_locale_menu_title' filter:

`
add_filter( 'jsm_user_locale_menu_title', 
	'customize_user_locale_menu_title', 10, 2 );

function customize_user_locale_menu_title( $menu_title, $menu_locale ) {
	return __( 'User Locale (%s)', 'your_text_domain' );
}
`

You can also modify the URL used to reload the page (after selecting a locale from the menu) by hooking the 'jsm_user_locale_redirect_url' filter.

`
add_filter( 'jsm_user_locale_redirect_url', 
	'customize_user_locale_redirect_url', 10, 2 );

function customize_user_locale_redirect_url( $url, $user_locale ) {
	// modify the redirect url here
	return $url;
}
`

== Screenshots ==

01. An example user locale language selector in the WordPress front-end toolbar menu.

== Changelog ==

= Repositories =

* [GitHub](https://jsmoriss.github.io/jsm-user-locale/)
* [WordPress.org](https://wordpress.org/plugins/jsm-user-locale/developers/)

= Version Numbering Scheme =

Version components: `{major}.{minor}.{bugfix}-{stage}{level}`

* {major} = Major code changes / re-writes or significant feature changes.
* {minor} = New features / options were added or improved.
* {bugfix} = Bugfixes or minor improvements.
* {stage}{level} = dev &lt; a (alpha) &lt; b (beta) &lt; rc (release candidate) &lt; # (production).

Note that the production stage level can be incremented on occasion for simple text revisions and/or translation updates. See [PHP's version_compare()](http://php.net/manual/en/function.version-compare.php) documentation for additional information on "PHP-standardized" version numbering.

= Changelog / Release Notes =

**Version 1.2.0-1 (2017/01/10)**

* *New Features*
	* Added a dashicon before the user locale menu title (default is the "translation" dashicon number 326).
* *Improvements*
	* Changed the "Toolbar Menu Title" default value from "User Locale (%s)" to "%s".
* *Bugfixes*
	* None
* *Developer Notes*
	* Added a new 'jsm_user_locale_menu_dashicon' filter.
	* Added a new 'jsm_user_locale_menu_items' filter.

**Version 1.1.4-1 (2017/01/08)**

* *New Features*
	* None
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* Added a filters.txt file to document the available filter hooks.
	* Changed the 'jsm_user_locale_menu_title' filter to pass the menu title before sprintf().

**Version 1.1.3-1 (2016/12/23)**

* *New Features*
	* None
* *Improvements*
	* Added a JSM_User_Locale::check_wp_version() method hooked to 'admin_init'.
* *Bugfixes*
	* None
* *Developer Notes*
	* None

**Version 1.1.2-1 (2016/12/21)**

* *New Features*
	* Added Polylang integration - the user locale menu will use the Polylang language URLs if available.
* *Improvements*
	* Renamed the "Select Locale" menu title to "User Locale" and included the current locale value.
* *Bugfixes*
	* None
* *Developer Notes*
	* None

**Version 1.0.0-1 (2016/12/17)**

* *New Features*
	* Initial release.
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* None

== Upgrade Notice ==

= 1.2.0-1 =

(2017/01/10) Added a dashicon before the user locale menu title. Changed the "Toolbar Menu Title" default value from "User Locale (%s)" to "%s".

= 1.1.4-1 =

(2017/01/08) Added a filters.txt file to document the available filter hooks. Changed the 'jsm_user_locale_menu_title' filter to pass the menu title before sprintf().

= 1.1.3-1 =

(2016/12/23) Added a JSM_User_Locale::check_wp_version() method hooked to 'admin_init'.

= 1.1.2-1 =

(2016/12/21) Added Polylang integration. Renamed the "Select Locale" menu title to "User Locale" and included the current locale value.

= 1.0.0-1 =

(2016/12/17) Initial release.

