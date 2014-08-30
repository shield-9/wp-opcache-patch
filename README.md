# WP OPcache Patch
* **Contributors**: extendwings,
* **Donate link**: http://www.extendwings.com/donate/
* **Tags**: PHP, Zend, OPcache, cache, patch, hotfix, bug, 
* **Requires at least**: 3.8
* **Tested up to**: 4.0
* **Stable tag**: 0.1.0
* **License**: AGPLv3 or later
* **License URI**: http://www.gnu.org/licenses/agpl.txt

*Improve OPcache compatibility with WordPress*

## Description

Are you experiencing the problem using WordPress with OPcache? It may occur after Upgrading Core/Plugin/Theme.
This plugin reset all cache after upgrading so that you don't have to see "Please update!" repeatedly.

### Notice
* All of this plugin's feature is included in [OPcache Dashboard](http://wordpress.org/plugins/opcache/).
  If we detected it is activated, this will be automatically deactivated to avoid conflict.
* **Important**: To use this plugin, check following.
	1. **PHP 5.5 or later**, Did you compile PHP with *--enable-opcache option*?
	2. **PHP 5.4 or earlier**, Did you installed *PECL ZendOpcache*?
	3. If not, please see [this document](http://php.net/book.opcache) and enable/install OPcache.

### License
* Copyright (c) 2012-2014 [Daisuke Takahashi(Extend Wings)](http://www.extendwings.com/)
* Portions (c) 2010-2012 Web Online.
* Unless otherwise stated, all files in this repo is licensed under *GNU AFFERO GENERAL PUBLIC LICENSE, Version 3*. See *LICENSE* file.

## Installation

1. Upload the `opcache` folder to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress

## Frequently Asked Questions

= This plugin is broken! Thanks for nothing! =
First of all, we supports PHP 5.4+, MySQL 5.5+, WordPress 3.8+. Old software(vulnerable!) is not supported.
If you're in supported environment, please create [pull request](https://github.com/shield-9/opcache-dashboard/compare/) or [issue](https://github.com/shield-9/opcache-dashboard/issues/new).

## Screenshots

None

## Changelog

### 0.1.0
* Initial Beta Release

## Upgrade Notice

### 0.1.0
* None
