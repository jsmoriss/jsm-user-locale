=== JSM's User Locale for the WordPress Toolbar ===
Plugin Name: JSM's User Locale
Plugin Slug: jsm-user-locale
Text Domain: jsm-user-locale
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Donate Link: https://www.paypal.me/jsmoriss
Assets URI: https://jsmoriss.github.io/jsm-user-locale/assets/
Tags: user, locale, language, select, admin, back-end, front-end
Contributors: jsmoriss
Requires At Least: 4.7
Tested Up To: 4.7
Stable Tag: 1.0.0-1

Add a locale (language) selector for users in the WordPress back-end and front-end toolbar menu.

== Description ==

Add a "Select Locale" menu item for users in the WordPress back-end and front-end toolbar menu.

Allow users to easily change their preferred locale (language) instead of having to update their profile page.

The default WordPress behavior is to apply the user locale preference to the back-end only &mdash; this plugin extends the user locale preference to the front-end webpage as well.

To exclude the "Select Locale" menu item from the front-end toolbar menu, *and ignore the user locale preference in the front-end webpage*, add the following to your functions.php file:

`
add_filter( 'jsm_user_locale_front_end', '__return_false' );
`

<blockquote>
<p>There are no settings to update or adjust &mdash; simply install and activate the plugin.</p>
</blockquote>

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

* None

== Screenshots ==

== Changelog ==

= Repositories =

* [GitHub](https://github.com/jsmoriss/jsm-user-locale)
* [WordPress.org](https://wordpress.org/plugins/jsm-user-locale/developers/)

= Version Numbering Scheme =

Version components: `{major}.{minor}.{bugfix}-{stage}{level}`

* {major} = Major code changes / re-writes or significant feature changes.
* {minor} = New features / options were added or improved.
* {bugfix} = Bugfixes or minor improvements.
* {stage}{level} = dev &lt; a (alpha) &lt; b (beta) &lt; rc (release candidate) &lt; # (production).

Note that the production stage level can be incremented on occasion for simple text revisions and/or translation updates. See [PHP's version_compare()](http://php.net/manual/en/function.version-compare.php) documentation for additional information on "PHP-standardized" version numbering.

= Changelog / Release Notes =

**Version 1.0.0-1 (TBD)**

* *New Features*
	* None
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* None

== Upgrade Notice ==

= 1.0.0-1 =

(TBD) None

