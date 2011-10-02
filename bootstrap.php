<?php

/**
 * wordpress shortcode port to fuel now power up your cms with shortcode
 * 
 * @package     Fuel shortcode
 * @author      umefarooq
 * @license     MIT license
 * @link        https://github.com/umefarooq/fuel_shortcode
 */


Autoloader::add_classes(array(
    'ShortCode\\Shortcode'        => __DIR__.'/classes/shortcode.php',
    'ShortCode\\Codes'        => __DIR__.'/classes/codes.php',
));

?>
