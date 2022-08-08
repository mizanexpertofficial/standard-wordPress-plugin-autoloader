# Standard WordPress Plugin Autoloader

The autoloader standard and maintain code quality, You can use your WordPress plugins project. Basically, the autoloader I made for Envato and all premium WordPress plugin marketplace.

Envato marketplace recommend unique namespace if you use namespace. Built in Object-Oriented Programming paradigm is the best security pattern, that best for future.

## Getting Started

This particular section is for those who want to _use_ the autoloader. If you're looking to contribute to the codebase,
please see the section below.

1. Clone or download this repository.
2. Copy the `includes` directory into the root of your project.
3. Add `require_once plugin_dir_path(__FILE__) . '/includes/autoloader.php` to your main plugin file.

### An Example

This autoloader expects several things:

1. You're following the [WordPress Coding Standards](https://make.wordpress.org/core/handbook/best-practices/coding-standards/php/#naming-conventions) as it relates to naming your classes.
2. The structure of your namespaces follows the structure of your directory structure

I've provided an example below for how both your code and your directory should be organized to take advantage of the
autoloader.

### The Directory Structure

And that all of the rest of the files are located in a directory structure like this:

```
+ plugin-name
|
|   includes
|       Admin
|         Admin.php
|
|       API
|         API.php
|
|       Helper
|         Helper.php
|
|       autoloader.php
|
|   plugin-name.php
```

### Adding The Autoloader

Then, at the top of your plugin file add the following:

```php
require_once plugin_dir_path(__FILE__) . '/includes/autoloader.php';
```

Then, register your namespace add the following:

```php
\MizanExpert\Autoloader::get_instance()->register();
\MizanExpert\Autoloader::get_instance()->add_namespace(
    'MizanExpert',
    realpath(plugin_dir_path(__FILE__) . '/includes')
);
```

## Other Information

If you're interested in contributing, reading more, and or following changes (all of which is welcome), please read
below.

- The project is licensed [GPL](LICENSE).
- If you're interested in contributing, please read [this document](CONTRIBUTING.md).
- See the [CHANGELOG](CHANGELOG.md) for a complete list of changes.
