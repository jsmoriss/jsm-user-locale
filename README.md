<h1>JSM&#039;s User Locale for the WordPress Toolbar</h1>

<table>
<tr><th align="right" valign="top" nowrap>Plugin Name</th><td>JSM&#039;s User Locale</td></tr>
<tr><th align="right" valign="top" nowrap>Summary</th><td>Add a quick and easy user locale / language selector in the WordPress admin back-end and front-end toolbar menus.</td></tr>
<tr><th align="right" valign="top" nowrap>Stable Version</th><td>1.2.2</td></tr>
<tr><th align="right" valign="top" nowrap>Requires At Least</th><td>WordPress 4.7</td></tr>
<tr><th align="right" valign="top" nowrap>Tested Up To</th><td>WordPress 4.8</td></tr>
<tr><th align="right" valign="top" nowrap>Contributors</th><td>jsmoriss</td></tr>
<tr><th align="right" valign="top" nowrap>License</th><td><a href="https://www.gnu.org/licenses/gpl.txt">GPLv3</a></td></tr>
<tr><th align="right" valign="top" nowrap>Tags / Keywords</th><td>user, locale, language, select, admin, back-end, front-end, polylang</td></tr>
</table>

<h2>Description</h2>

<p><strong>Add a user locale drop-down menu item in the WordPress admin back-end admin and front-end toolbar menus.</strong></p>

<p><strong>Perfect for translators or anyone who needs to switch languages quickly and easily</strong> &mdash; allows logged-in users to change their preferred locale / language setting right from the toolbar menu (instead of having to update their WordPress user profile page).</p>

<p>The default WordPress behavior is to apply the user locale preference to the admin back-end only &mdash; this plugin extends the user locale / language preference to the front-end webpage as well.</p>

<blockquote>
<p>There are no plugin settings &mdash; simply install and activate the plugin.</p>
</blockquote>

<h4>Power-Users / Developers</h4>

<p>See the plugin <a href="https://wordpress.org/plugins/jsm-user-locale/other_notes/">Other Notes</a> page for information on available filters.</p>

<h4>Do you use the Polylang plugin?</h4>

<p>If the Polylang plugin is active, the user locale menu will automatically use the correct Polylang language URLs for the current webpage.</p>

<h4>Do you use the WPSSO plugin?</h4>

<p>If you're using the <a href="https://wordpress.org/plugins/wpsso/">WPSSO</a> plugin, the <a href="https://wordpress.org/plugins/wpsso-user-locale/">WPSSO User Locale Selector (WPSSO UL)</a> extension offers the same functionality, with the addition of a settings page to modify the menu icon, menu title, and enable/disable the user locale menu on the front-end.</p>


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

<p><strong>Developer Filters</strong></p>

<p>To exclude the user locale menu item from the front-end toolbar menu, <em>and ignore the user locale / language preference in the front-end webpage</em>, add the following filter hook to your functions.php file:</p>

<p><code>add_filter( 'jsm_user_locale_front_end', '__return_false' );</code></p>

<p>To modify the user locale menu title (default is "%s"), you can hook the 'jsm_user_locale_menu_title' filter:</p>

<p>`<br />
    add_filter( 'jsm_user_locale_menu_title', 
        'customize_user_locale_menu_title', 10, 2 );</p>

<pre><code>function customize_user_locale_menu_title( $menu_title, $menu_locale ) {
    return __( 'User Locale (%s)', 'your_text_domain' );
}
</code></pre>

<p>`</p>

<p>You can also modify the URL used to reload the page (after selecting a locale from the menu) by hooking the 'jsm_user_locale_redirect_url' filter.</p>

<p>`<br />
    add_filter( 'jsm_user_locale_redirect_url', 
        'customize_user_locale_redirect_url', 10, 2 );</p>

<pre><code>function customize_user_locale_redirect_url( $url, $user_locale ) {
    // modify the redirect url here
    return $url;
}
</code></pre>

<p>`</p>

