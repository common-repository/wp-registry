=== WP_Registry ===
Contributors: Jan Gorman
Donate Link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=10322353
Tags: globals, registry, spl, arrayobject
Requires at least: 2.8
Tested up to: 2.9
Stable tag: 0.2

The plugin provides a globally accessible container for storing values of any kind.

== Description ==

The plugin provides a globally accessible container for storing values of any kind.
The Registry is a singleton and you can set values inside the registry like this:

`WP_Registry::set( 'key', $value )`

which can then be retrieved at any time like this:

`WP_Registry::get( 'key' )`

== Installation ==

1. Upload `wp_registry.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Which version of PHP is required? =

This is a PHP 5+ plugin only. Internally it uses the SPL [ArrayObject](http://www.php.net/manual/de/class.arrayobject.php) for data storage. Making PHP5 a requirement.

== Changelog ==

= 0.2 =
* Tested with Wordpress 2.9, plugin is compatible
= 0.1 =
* Initial plugin release