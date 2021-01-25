<?php
define('VKCLASSES', __DIR__.'/vk-php-sdk/src/');
define('CLIENT_ID', '7725153');
define('REDIRECT_URL', 'http://localhost/token.php');

spl_autoload_register(function($class){    
    include VKCLASSES .str_replace("\\","/",$class) . ".php";
});