=== JSM's Simple User Locale Selector ===
Plugin Name: JSM's Simple User Locale Selector
Plugin Slug: jsm-user-locale
Text Domain: jsm-user-locale
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Assets URI: https://jsmoriss.github.io/jsm-user-locale/assets/
Tags: user, locale, language, select, admin, back-end, front-end, polylang
Contributors: jsmoriss
Requires PHP: 7.0
Requires At Least: 4.7
Tested Up To: 5.7.2
Stable Tag: 2.0.0

Add a quick and easy user locale / language selector in the WordPress admin back-end and front-end toolbar menus.

== Description ==

Add a user locale drop-down menu item in the WordPress admin back-end admin and front-end toolbar menus.

Perfect for anyone that needs to switch languages quickly and easily &mdash; allows logged-in users to change their preferred locale / language setting right from the toolbar menu (instead of having to update their WordPress user profile page).

The default WordPress behavior is to apply the user locale preference to the admin back-end only &mdash; this plugin extends the user locale / language preference to the front-end webpage as well.

There are no plugin settings &mdash; simply *install* and *activate* the plugin.

= Do you use the Polylang plugin? =

If the Polylang plugin is active, the user locale menu will automatically use the correct Polylang language URLs for the current webpage.

= Need a Boost to your Social and Search Ranking? =

Check out [the WPSSO Core plugin](https://wordpress.org/plugins/wpsso/) to present your content at its best on social sites and in search results, no matter how webpages are shared, re-shared, messaged, posted, embedded, or crawled.

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

1. Download the plugin ZIP file.
1. Go to the wp-admin/ section of your website.
1. Select the *Plugins* menu item.
1. Select the *Add New* sub-menu item.
1. Click on *Upload* link (just under the Install Plugins page title).
1. Click the *Browse...* button.
1. Navigate your local folders / directories and choose the ZIP file you downloaded previously.
1. Click on the *Install Now* button.
1. Click the *Activate Plugin* link.

== Frequently Asked Questions ==

== Screenshots ==

01. An example user locale language selector in the WordPress front-end toolbar menu.

== Changelog ==

<h3 class="top">Version Numbering</h3>

Version components: `{major}.{minor}.{bugfix}[-{stage}.{level}]`

* {major} = Major structural code changes / re-writes or incompatible API changes.
* {minor} = New functionality was added or improved in a backwards-compatible manner.
* {bugfix} = Backwards-compatible bug fixes or small improvements.
* {stage}.{level} = Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).

<h3>Repositories</h3>

* [GitHub](https://jsmoriss.github.io/jsm-user-locale/)
* [WordPress.org](https://plugins.trac.wordpress.org/browser/jsm-user-locale/)

<h3>Changelog / Release Notes</h3>

**Version 2.0.0 (2020/10/15)**

Maintenance release.

* **New Features**
	* None.
* **Improvements**
	* Added a call to switch_to_locale() on the front-end.
* **Bugfixes**
	* None.
* **Developer Notes**
	* None.
* **Requires At Least**
	* PHP v7.0.
	* WordPress v4.7.

== Upgrade Notice ==

= 2.0.0 =

(2020/10/15) Added a call to switch_to_locale() on the front-end.

