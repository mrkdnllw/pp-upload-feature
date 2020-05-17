<?php
/*
Plugin Name: profile photo upload feature
Plugin URI:  github.com 
Description: xx
Version:     1
Author:      Mark Daniel Louwe, Danica Niña Louwe
Author URI:  https://louwewebdesignservices.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

//test
//test2

//make shortcode 


add_shortcode( 'profile_photo_louwe', 'profile_photo_louwe_fun' );

function profile_photo_louwe_fun( $atts ) {
    return "hellooo";
}