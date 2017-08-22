 === Plain Logger  ===
 
Contributors: hxh90
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Tags: actions, activity, debugging, admin, best error log, best log viewer, best plugin, clear log, custom error, custom error types, custom reporting, dashboard, debug, debug log, debug plugin, debug theme, debug tool, debugging, development, display errors, download log, enable debugging, error, error log, error logging, error reporter, error reporting, error tracker, error tracking, errors, free, free debugging, free error log, log, log monitor, log viewer, log viewing, notifications, php errors, php error log, plugin, plugin errors, plugin testing, plain logger

Requires at least: 3.9
Tested up to: 4.7
Stable tag: 1.1.1

== Description ==

Easily log any event on your WordPress site to text file. When simple echo and var_dump just won't do.

= Features =
* Clear log with one click
* Refresh log with one click

== Installation ==

= From your WordPress Dashboard =

1. Click on "Plugins > Add New" in the sidebar
2. Search for "Plain Logger"
3. Activate Plain Logger from the plugins page

= From wordpress.org =

1. Search for "Plain Logger"
2. Download the plugin to your local computer
3. Upload the wp-log-viewer directory to your "/wp-content/plugins" directory using your favorite ftp/sftp/scp program
4. Activate Plain Logger from the plugins page

= Once Activated =

Click on "Tools > Plain Logger" in the sidebar.

= Requirements =
* PHP 5.4.0 or greater
* WordPress 3.9 or above

== Frequently Asked Questions ==

= How do I log event / error? =

To log event, use Plain_Logger::get_instance()->log("Log label", "Logging some event"); on some WordPress hook or any place you want to log.

== Screenshots ==

1. ** Log view ** - Log view area where logged event / error will be displayed.

== Changelog ==

= 1.1.1 =
* Add new action to make it compatible on Theme frontend testing.
* Fix admin hiding submit button for other setting page.
* Load plugin class faster to make the usable on other plugins / themes. 

= 1.0.0 =
* Initial release
Release date: 2017-01-29

Copyright 2017 Septian Ahmad Fujianto <http://septianfujianto.com>