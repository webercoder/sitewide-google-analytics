=== Plugin Name ===
Contributors: coderguy
Tags: google, analytics, sitewide, network, multisite
Requires at least: 3.1
Tested up to: 3.4.2
Stable tag: 1.2.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin adds Google Analytics tracking code to all WordPress pages. In network/multisite mode, this tracking code 
will be the same on all sites.

== Description ==

This plugin adds Google Analytics tracking code to all WordPress pages. If multisite/network mode is enabled, this 
tracking code will be the same on all sites, which was the main purpose for authoring it.

It's very basic.

This plugin includes a settings page that allows users to enable or disable the tracking code, enter their account ID, 
and provide a single domain, which is used for aggregating statistics across multiple sub-domains. For WordPress 
Network installations, this page is located under the Settings menu of the Network administration area. For normal 
WordPress installations, this page is located under the Settings menu of the standard administration area.

I needed this functionality but couldn't find it elsewhere, so I decided to write a plugin. I'm totally open to improving 
this plugin as well so please contact me with feature requests or bug reports.

== Installation ==

1. Upload the `sitewide-google-analytics` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the `Plugins` menu in WordPress.
3. Go to the Settings page, add your Analytics token/key, and check the enable box. Click the Save button.

== Frequently Asked Questions ==

= What is the Domain field? =

The Domain field is for capturing statistics on multiple sub-domains. Please refer to Google's documentation
for more information. 
https://developers.google.com/analytics/devguides/collection/gajs/gaTrackingSite#yourDomainName

== Screenshots ==

1. This is the administrative section of Sitewide Google Analytics.

== Changelog ==

= 1.2.2 =
* Forcing wordpress to update by updating stable tag in the header above.

= 1.2.1 =
* Added upgrade information to this log.

= 1.2 =
* update_option and get_option changed to update_site_option and get_site_option.

= 1.1 =
* Added templates (previous version is non-working).

= 1.0 =
* Initial submission.

== Upgrade Notice ==

= 1.2.2 =

Please fill in your Google Analytics details again.

= 1.1 =

Copy error on initial release.

