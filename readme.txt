=== JSM User Locale Selector ===
Plugin Name: JSM User Locale Selector
Plugin Slug: jsm-user-locale
Text Domain: jsm-user-locale
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Assets URI: https://jsmoriss.github.io/jsm-user-locale/assets/
Tags: user, locale, language, select, polylang
Contributors: jsmoriss
Requires PHP: 7.4.33
Requires At Least: 5.9
Tested Up To: 6.7.0
Stable Tag: 2.2.1

Add a quick and easy user locale / language selector in the WordPress admin back-end and front-end toolbar menus.

== Description ==

Add a user locale drop-down menu item in the WordPress admin back-end admin and front-end toolbar menus.

Perfect for anyone that needs to switch languages quickly and easily - allows logged-in users to change their preferred locale / language setting right from the toolbar menu (instead of having to update their WordPress user profile page).

The default WordPress behavior is to apply the user locale preference to the admin back-end only - this plugin extends the user locale / language preference to the front-end webpage as well.

There are no plugin settings - simply install and activate the plugin.

= Do you use the Polylang plugin? =

If the Polylang plugin is active, the user locale menu will automatically use the correct Polylang language URLs for the current webpage.

== Installation ==

== Frequently Asked Questions ==

== Screenshots ==

01. An example user locale language selector in the WordPress front-end toolbar menu.

== Changelog ==

<h3 class="top">Version Numbering</h3>

Version components: `{major}.{minor}.{bugfix}[-{stage}.{level}]`

* {major} = Major structural code changes and/or incompatible API changes (ie. breaking changes).
* {minor} = New functionality was added or improved in a backwards-compatible manner.
* {bugfix} = Backwards-compatible bug fixes or small improvements.
* {stage}.{level} = Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).

<h3>Repositories</h3>

* [GitHub](https://jsmoriss.github.io/jsm-user-locale/)
* [WordPress.org](https://plugins.trac.wordpress.org/browser/jsm-user-locale/)

<h3>Changelog / Release Notes</h3>

**Version 2.2.1 (2023/07/08)**

* **New Features**
	* None.
* **Improvements**
	* None.
* **Bugfixes**
	* None.
* **Developer Notes**
	* Minor code optimization and standardization:
		* Replaced `{get|update|delete}_{comment|post|term|user}_meta()` functions by `{get|update|delete}_metadata()`.
* **Requires At Least**
	* PHP v7.4.33.
	* WordPress v5.9.

== Upgrade Notice ==

= 2.2.1 =

(2023/07/08) Minor code optimization and standardization.

