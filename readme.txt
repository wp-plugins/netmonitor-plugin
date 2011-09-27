=== NetMonitor Plugin ===
Tags: analytics, netmonitor
Requires at least: 2.6
Tested up to: 3.1.2
Stable tag: 1.1

Automatically generates a NetMonitor tracking tag for your pages.

== Description ==

This plugin can be used to automatically generate and insert a netmonitor tracking tag on your page or blog
built using wordpress. It can automatically set extra parameters for the tracking code to allow you to track
pages based on their title as well as tracking logged in users.
NOTE: This plugin requires a NetMonitor account, more information can be found at www.getnetmonitor.com

== Installation ==

1. Upload netmonitor.php and nm_admin.php to `/wp-content/plugins/netmonitor-plugin/`
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Enter your NetMonitor site-id and choose what to track under 'NetMonitor' in the 'Settings' menu
1. If you are using a template that calls the wp_footer function (the standard is to do so), you're done!
1. If your template doesn't call wp_footer you'll have to add `<?php wp_footer(); ?>` just before the `</body>` tag in you template footer.
