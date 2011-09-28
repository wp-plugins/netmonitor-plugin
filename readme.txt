=== Netmonitor Plugin ===
Tags: analytics, netmonitor
Requires at least: 2.6
Tested up to: 3.2.1
Stable tag: 1.2

Automatically generates a Netmonitor tracking tag for your pages.

== Description ==

This plugin can be used to automatically generate and insert a netmonitor tracking tag on your page or blog
built using wordpress. It can automatically set extra parameters for the tracking code to allow you to track
pages based on their title as well as tracking logged in users.
NOTE: This plugin requires a Netmonitor account, more information can be found at www.getnetmonitor.com

== Installation ==

1. Upload netmonitor.php and nm_admin.php to `/wp-content/plugins/netmonitor-plugin/`
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Enter your Netmonitor site-id and choose what to track under 'Netmonitor' in the 'Settings' menu
1. If you are using a template that calls the wp_footer function (the standard is to do so), you're done!
1. If your template doesn't call wp_footer you'll have to add `<?php wp_footer(); ?>` just before the `</body>` tag in you template footer.
