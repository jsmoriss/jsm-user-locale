<h1>JSM&#039;s User Locale for the WordPress Toolbar</h1>

<table>
<tr><th align="right" valign="top" nowrap>Plugin Name</th><td>JSM&#039;s User Locale</td></tr>
<tr><th align="right" valign="top" nowrap>Summary</th><td>Add a quick &amp; easy locale / language selector for users in the WordPress admin back-end and front-end toolbar menus.</td></tr>
<tr><th align="right" valign="top" nowrap>Stable Version</th><td>1.1.2-1</td></tr>
<tr><th align="right" valign="top" nowrap>Requires At Least</th><td>WordPress 4.7</td></tr>
<tr><th align="right" valign="top" nowrap>Tested Up To</th><td>WordPress 4.7</td></tr>
<tr><th align="right" valign="top" nowrap>Contributors</th><td>jsmoriss</td></tr>
<tr><th align="right" valign="top" nowrap>Website URL</th><td><a href="https://www.paypal.me/jsmoriss">https://www.paypal.me/jsmoriss</a></td></tr>
<tr><th align="right" valign="top" nowrap>License</th><td><a href="https://www.gnu.org/licenses/gpl.txt">GPLv3</a></td></tr>
<tr><th align="right" valign="top" nowrap>Tags / Keywords</th><td>user, locale, language, select, admin, back-end, front-end</td></tr>
</table>

<h2>Description</h2>

<p>Add a "User Locale" menu item for users in the WordPress back-end (admin) and front-end toolbar menus.</p>

<p>Allow users to easily change their preferred locale / language instead of having to update their profile page.</p>

<p>The default WordPress behavior is to apply the user locale / language preference to the back-end only &mdash; this plugin extends the user locale / language preference to the front-end webpage as well.</p>

<p>If the Polylang plugin is available, the "User Locale" menu will use Polylang language URLs for that locale.</p>

<blockquote>
<p>There are no settings to update or adjust &mdash; simply install and activate the plugin.</p>
</blockquote>

<h4>Developers</h4>

<p>See the plugin <a href="https://wordpress.org/plugins/jsm-user-locale/other_notes/">Other Notes</a> for available filters and examples.</p>


<h2>Installation</h2>

<h4>Automated Install</h4>

<ol>
<li>Go to the wp-admin/ section of your website.</li>
<li>Select the <em>Plugins</em> menu item.</li>
<li>Select the <em>Add New</em> sub-menu item.</li>
<li>In the <em>Search</em> box, enter the plugin name.</li>
<li>Click the <em>Search Plugins</em> button.</li>
<li>Click the <em>Install Now</em> link for the plugin.</li>
<li>Click the <em>Activate Plugin</em> link.</li>
</ol>

<h4>Semi-Automated Install</h4>

<ol>
<li>Download the plugin archive file.</li>
<li>Go to the wp-admin/ section of your website.</li>
<li>Select the <em>Plugins</em> menu item.</li>
<li>Select the <em>Add New</em> sub-menu item.</li>
<li>Click on <em>Upload</em> link (just under the Install Plugins page title).</li>
<li>Click the <em>Browse...</em> button.</li>
<li>Navigate your local folders / directories and choose the zip file you downloaded previously.</li>
<li>Click on the <em>Install Now</em> button.</li>
<li>Click the <em>Activate Plugin</em> link.</li>
</ol>


<h2>Frequently Asked Questions</h2>

<h4>Frequently Asked Questions</h4>

<ul>
<li>None</li>
</ul>


<h2>Other Notes</h2>

<h3>Other Notes</h3>
<h4>Additional Documentation</h4>

<p>To exclude the "User Locale" menu item from the front-end toolbar menu, <em>and ignore the user locale / language preference in the front-end webpage</em>, add the following to your functions.php file:</p>

<pre><code>add_filter( 'jsm_user_locale_front_end', '__return_false' );
</code></pre>

<p>To modify the "User Locale" menu title, you can hook the 'jsm_user_locale_menu_title' filter:</p>

<pre><code>add_filter( 'jsm_user_locale_menu_title', 
    'customize_user_locale_menu_title', 10, 2 );

function customize_user_locale_menu_title( $title, $user_locale ) {
    $menu_locale = $user_locale === 'site-default' ? 
        __( 'default', 'jsm-user-locale' ) : $user_locale;

    $title = sprintf( __( 'Select Locale (%s)',
        'jsm-user-locale' ), $menu_locale );

    return $title;
}
</code></pre>

<p>You can also modify the URL used to reload the page after selecting a locale by hooking the 'jsm_user_locale_redirect_url' filter.</p>

<pre><code>add_filter( 'jsm_user_locale_redirect_url', 
    'customize_user_locale_redirect_url', 10, 2 );

function customize_user_locale_redirect_url( $url, $user_locale ) {
    // modify the redirect url here
    return $url;
}
</code></pre>

