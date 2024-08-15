<?php
/*
Plugin Name: composer in wordpress
Plugin URI: http://websolor.ir/
Description: استفاده از کامپوزر در وردپرس
Author: Naeem soltany
Text Domain: composer in wp
Version: 1.0.0
Author URI: http://websolor.ir/
*/

// for load autoload class
// load required class
define('PHP_COMPOSER_ROOT',plugin_dir_path(__FILE__));
require PHP_COMPOSER_ROOT . 'vendor/autoload.php';

// use illuminate
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\User;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'wordpressdb',
    'username' => 'root',
    'password' => '1289..//',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => 'wp_',
]);

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();


//

$users = User::get();
// var_dump($users);
var_dump($users->count());
var_dump($users->first()->display_name);