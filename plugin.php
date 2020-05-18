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
            <input type="submit" value="upload profile picture" name="submit">
            </div>
            <button>refresh photo</button>
    </form>


    <?php

    $target_dir = plugin_dir_path( __FILE__ ) . 'user-photos/';
    echo "target_dir: ".$target_dir;

    //final file name part bef user id
    //temp name ni
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    $uploadOk = 1;

    
		
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		//finalizing file name chuchu
	$target_file = $target_dir . 'profile-pic-'. get_current_user_id().'.'.$imageFileType;
        echo "user_id: ".get_current_user_id();
    
    if(isset($_POST["submit"])) {

        // Check if file already exists
			if (file_exists($target_file)) {
				
				// del file
				unlink($target_file);

            }
            

            // Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "jpeg") {
				echo "<p>Sorry, only JPEG/JPG files are allowed.</p>";
				$uploadOk = 0;
            }
            
            // Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "<p>Sorry, your file was not uploaded.</p>";
			// if everything is ok, try to upload file
			} else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					//done nothing 
					/*
					q
					x get_current_user_id()
					x iset ang has_profile_{{id}} nga chongkang
					x
					x 

					*/
					//update_option('has_pp_'.get_current_user_id(),'yes');
					
				} else {
					//update_option('has_pp_'.get_current_user_id(),'no');
                    echo "<p>move_uploaded_file() error: </p>";
                    echo $_FILES["fileToUpload"]["error"];
				}

            }// close if uploadok   

    }// close isset..

}// close profile photo louwe fun 