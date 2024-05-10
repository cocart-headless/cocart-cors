# Changelog for CoCart CORS

## v1.0.6 - 10th May, 2024

### Compatibility

* Tested with WooCommerce v8.8
* Tested with WordPress v6.5

## v1.0.5 - 3rd January, 2024

* Fixed fatal error if the version of CoCart is undefined because the main plugin is not found.

## v1.0.4 - 6th November, 2023

### What's Changed?

* Initiating the plugin on `plugins_loaded` hook instead of `cocart_init` hook. Fixes [#20](https://github.com/cocart-headless/cocart-cors/issues/20)

### Compatibility

* Tested with WooCommerce v8.3

## v1.0.3 - 8th August, 2023

### What's Changed?

* Removed WooCommerce plugin headers to prevent incompatibility warning message when using "HPOS" feature.

### Compatibility

* Ready for CoCart v4
* Tested with WooCommerce v7.9
* Tested with WordPress v6.3

## v1.0.2 - 19th July, 2022

### What's Changed?

* Tweak: Made sure the session cookie is only filtered if the WordPress site is secure.

### Compatibility

* Tested with CoCart v3.7 and up
* Tested with WooCommerce v6.7
* Tested with WordPress v6.0

## v1.0.1 - 29th March, 2022

### Compatibility

* Tested with CoCart v3.1 and up
* Tested with WooCommerce v6.3
* Tested with WordPress v5.9

## v1.0.0 - 4th April, 2021

* Initial release.
