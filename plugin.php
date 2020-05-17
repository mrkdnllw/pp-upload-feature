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
    //return "hellooo";

//find profile pic na same og id sa user like pp-id
?>
<img src="smiley<?php 

echo $id;?>.gif" alt="Smiley face" height="42" width="42">

<form action="" method="post" enctype="multipart/form-data">		
		<div><input type="file" name="fileToUpload" id="fileToUpload"></div>
        <div>
		<input type="submit" value="Upload Image" name="submit">
        </div>
</form>


<?php


}